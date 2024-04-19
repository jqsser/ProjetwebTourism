// Initialize necessary variables
let camera;
let scene;
let renderer;
let material;
let mouseX = 0;
let mouseY = 0;
let windowHalfX = window.innerWidth / 2;
let windowHalfY = window.innerHeight / 2;

init();
animate();










// Function to initialize the scene
function init() {
    // Create the camera
    camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 5, 2000);
    camera.position.z = 500;

    // Create the scene
    scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0x0000ff, 0.001);

    // Create the geometry and material
    const geometry = new THREE.BufferGeometry();
    const vertices = [];
    const size = 2000;

    // Add random vertices to the geometry
    for (let i = 0; i < 200000; i++) {
        const x = (Math.random() * size + Math.random() * size) / 2 - size / 2;
        const y = (Math.random() * size + Math.random() * size) / 2 - size / 2;
        const z = (Math.random() * size + Math.random() * size) / 2 - size / 2;
        vertices.push(x, y, z);
    }
    geometry.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));

    // Create the material and particles
    material = new THREE.PointsMaterial({
        size: 2,
        color: 0xffffff,
    });
    const particles = new THREE.Points(geometry, material);
    scene.add(particles);

    // Create the renderer and set its size
    renderer = new THREE.WebGLRenderer();
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight); // Full width and height
    document.body.appendChild(renderer.domElement);

    // Set the renderer's canvas to cover the whole screen
    renderer.domElement.style.position = 'absolute';
    renderer.domElement.style.top = 0;
    renderer.domElement.style.left = 0;
    renderer.domElement.style.zIndex = -1; // Behind other elements

    // Event listeners
    document.body.addEventListener('pointermove', onPointerMove);
    window.addEventListener('resize', onWindowResize);
}

// Function to handle window resizing
function onWindowResize() {
    windowHalfX = window.innerWidth / 2;
    windowHalfY = window.innerHeight / 2;

    // Update camera aspect ratio and renderer size
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

// Function to handle mouse movement
function onPointerMove(event) {
    mouseX = event.clientX - windowHalfX;
    mouseY = event.clientY - windowHalfY;
}

// Function to animate the scene
function animate() {
    requestAnimationFrame(animate);
    render();
}

// Function to render the scene
function render() {
    // Adjust camera position based on mouse movement
    camera.position.x += (mouseX * 2 - camera.position.x) * 0.02;
    camera.position.y += (mouseY * 2 - camera.position.y) * 0.02;
    camera.lookAt(scene.position);

    // Render the scene
    renderer.render(scene, camera);

    // Rotate the scene slightly for animation effect
    scene.rotation.x += 0.003;
    scene.rotation.y += 0.003;
}

