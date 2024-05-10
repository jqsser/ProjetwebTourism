// Initialize necessary variables
let camera, scene, renderer, material, particles;
let mouseX = 0, mouseY = 0;
let windowHalfX = window.innerWidth / 2;
let windowHalfY = window.innerHeight / 2;

// Initialize the 3D model
init();

// Function to initialize the scene
function init() {
    // Create the camera
    camera = new THREE.PerspectiveCamera(50, window.innerWidth / window.innerHeight, 1, 2000);
    camera.position.z = 1000;

    // Create the scene
    scene = new THREE.Scene();

    // Create the geometry and material for particles
    const geometry = new THREE.BufferGeometry();
    const vertices = [];
    const size = 2000;

    // Add random vertices to the geometry
    for (let i = 0; i < 10000; i++) {
        const x = Math.random() * size - size / 2;
        const y = Math.random() * size - size / 2;
        const z = Math.random() * size - size / 2;
        vertices.push(x, y, z);
    }
    geometry.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));

    material = new THREE.PointsMaterial({ color: 0xffffff, size: 5 });
    particles = new THREE.Points(geometry, material);
    scene.add(particles);

    // Create the renderer and set its size
    renderer = new THREE.WebGLRenderer();
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    // Event listeners
    document.body.addEventListener('pointermove', onPointerMove);
    window.addEventListener('resize', onWindowResize);
    window.addEventListener('scroll', onScroll);

    // Start animation
    animate();
}

// Function to handle window resizing
function onWindowResize() {
    windowHalfX = window.innerWidth / 2;
    windowHalfY = window.innerHeight / 2;

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

// Function to handle mouse movement
function onPointerMove(event) {
    mouseX = (event.clientX - windowHalfX);
    mouseY = (event.clientY - windowHalfY);
}

// Function to handle window scroll
function onScroll() {
    // Get the current scroll position
    const scrollPosition = window.scrollY;

    // Adjust the camera's z-position based on the scroll position
    camera.position.z = 1000 - scrollPosition;

    // Optionally, you can also adjust the camera's x and y positions based on scroll
     camera.position.x = mouseX;
     camera.position.y = mouseY;
}

// Function to animate the scene
function animate() {
    requestAnimationFrame(animate);
    render();
}

// Function to render the scene
function render() {
    // Adjust the camera's position
    camera.position.x += (mouseX - camera.position.x) * 0.01;
    camera.position.y += (mouseY - camera.position.y) * 0.01;
    camera.lookAt(scene.position);

    // Render the scene
    renderer.render(scene, camera);
}
