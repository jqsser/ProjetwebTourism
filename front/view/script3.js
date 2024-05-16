let camera, scene, renderer;
let particles;
let mouseX = 0, mouseY = 0;

init();
animate();

function init() {
    // Camera setup
    camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 3000);
    camera.position.z = 1000;

    // Scene setup
    scene = new THREE.Scene();
    scene.fog = new THREE.FogExp2(0x0000ff, 0.001);

    // Create particle geometry
    const geometry = new THREE.BufferGeometry();
    const vertices = [];

    for (let i = 0; i < 5000; i++) {
        const x = (Math.random() - 0.5) * 2000;
        const y = (Math.random() - 0.5) * 2000;
        const z = (Math.random() - 0.5) * 2000;
        vertices.push(x, y, z);
    }

    geometry.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));

    // Particle material
    const material = new THREE.PointsMaterial({ size: 3, color: 0xffffff });
    particles = new THREE.Points(geometry, material);
    scene.add(particles);

    // Renderer setup
    renderer = new THREE.WebGLRenderer();
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight);
    document.body.appendChild(renderer.domElement);

    // Event listeners
    document.addEventListener('mousemove', onDocumentMouseMove, false);
    window.addEventListener('resize', onWindowResize, false);
}

function onDocumentMouseMove(event) {
    mouseX = (event.clientX - window.innerWidth / 2) * 2;
    mouseY = (event.clientY - window.innerHeight / 2) * 2;
}

function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

function animate() {
    requestAnimationFrame(animate);
    render();
}

function render() {
    camera.position.x += (mouseX - camera.position.x) * 0.05;
    camera.position.y += (mouseY - camera.position.y) * 0.05;
    camera.lookAt(scene.position);

    particles.rotation.x += 0.001;
    particles.rotation.y += 0.002;

    renderer.render(scene, camera);
}
