<!DOCTYPE html>
<html lang="en">
	<head>
		<title>three.js webgpu - postprocessing anamorphic</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
		<link type="text/css" rel="stylesheet" href="main.css">
	</head>
	<body>

		<div id="info">
			<a href="https://threejs.org" target="_blank" rel="noopener">three.js</a> webgpu - postprocessing anamorphic<br />
			Battle Damaged Sci-fi Helmet by
			<a href="https://sketchfab.com/theblueturtle_" target="_blank" rel="noopener">theblueturtle_</a><br />
		</div>

		<script type="importmap">
			{
				"imports": {
					"three": "../build/three.module.js",
					"three/addons/": "./jsm/",
					"three/nodes": "./jsm/nodes/Nodes.js"
				}
			}
		</script>

		<script type="module">

			import * as THREE from 'three';
			import { pass, cubeTexture, viewportTopLeft, uniform } from 'three/nodes';

			import WebGPU from 'three/addons/capabilities/WebGPU.js';
			import WebGL from 'three/addons/capabilities/WebGL.js';

			import WebGPURenderer from 'three/addons/renderers/webgpu/WebGPURenderer.js';

			import PostProcessing from 'three/addons/renderers/common/PostProcessing.js';

			import { RGBMLoader } from 'three/addons/loaders/RGBMLoader.js';

			import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
			import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

			import { GUI } from 'three/addons/libs/lil-gui.module.min.js';

			let camera, scene, renderer;
			let postProcessing;

			init();

			async function init() {

				if ( WebGPU.isAvailable() === false && WebGL.isWebGL2Available() === false ) {

					document.body.appendChild( WebGPU.getErrorMessage() );

					throw new Error( 'No WebGPU or WebGL2 support' );

				}

				const container = document.createElement( 'div' );
				document.body.appendChild( container );

				camera = new THREE.PerspectiveCamera( 45, window.innerWidth / window.innerHeight, 0.25, 20 );
				camera.position.set( - 1.8, - 0.6, 2.7 );

				scene = new THREE.Scene();

				const rgbmUrls = [ 'px.png', 'nx.png', 'py.png', 'ny.png', 'pz.png', 'nz.png' ];
				const cube1Texture = await new RGBMLoader()
					.setMaxRange( 16 )
					.setPath( './textures/cube/pisaRGBM16/' )
					.loadCubemapAsync( rgbmUrls );

				scene.environment = cube1Texture;
				scene.backgroundNode = cubeTexture( cube1Texture ).mul( viewportTopLeft.distance( .5 ).oneMinus().remapClamp( .1, 4 ) ).saturation( 0 );

				const loader = new GLTFLoader().setPath( 'models/gltf/DamagedHelmet/glTF/' );
				loader.load( 'untitled.gltf', function ( gltf ) {

					scene.add( gltf.scene );

				} );

				renderer = new WebGPURenderer( { antialias: true } );

				renderer.setPixelRatio( window.devicePixelRatio );
				renderer.setSize( window.innerWidth, window.innerHeight );
				renderer.toneMapping = THREE.LinearToneMapping;
				renderer.toneMappingExposure = 1;
				renderer.setAnimationLoop( render );
				container.appendChild( renderer.domElement );

				const controls = new OrbitControls( camera, renderer.domElement );
				controls.minDistance = 2;
				controls.maxDistance = 10;

				// post-processing

				const scenePass = pass( scene, camera );

				const threshold = uniform( 1.4 );
				const scaleNode = uniform( 5 );
				const intensity = uniform( 1 );
				const samples = 64;

				const anamorphicPass = scenePass.getTextureNode().anamorphic( threshold, scaleNode, samples );
				anamorphicPass.resolution = new THREE.Vector2( .2, .2 ); // 1 = full resolution

				postProcessing = new PostProcessing( renderer );
				postProcessing.outputNode = scenePass.add( anamorphicPass.mul( intensity ) );
				//postProcessing.outputNode = scenePass.add( anamorphicPass.getTextureNode().gaussianBlur() );

				// gui

				const gui = new GUI();
				gui.add( intensity, 'value', 0, 4, 0.1 ).name( 'intensity' );
				gui.add( threshold, 'value', .8, 3, .001 ).name( 'threshold' );
				gui.add( scaleNode, 'value', 1, 10, 0.1 ).name( 'scale' );
				gui.add( anamorphicPass.resolution, 'x', .1, 1, 0.1 ).name( 'resolution' ).onChange( ( v ) => anamorphicPass.resolution.y = v );

				//

				window.addEventListener( 'resize', onWindowResize );

			}

			function onWindowResize() {

				camera.aspect = window.innerWidth / window.innerHeight;
				camera.updateProjectionMatrix();

				renderer.setSize( window.innerWidth, window.innerHeight );

			}

			//

			function render() {

				postProcessing.render();

			}

		</script>

	</body>
</html>
