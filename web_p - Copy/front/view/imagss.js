// Radius of the circular path
const radius = 20; // Adjust this value as needed for the size of the circular path

// Speed of rotation (angle change in radians)
const speed = 0.01; // Adjust this value as needed for the speed of rotation

// Starting angle (in radians)
let angle = 0;

// Update function to move the image in a circular path
function update() {
    // Calculate the new position of the image along the circular path
    const image = document.getElementById('floatingImage');
    image.style.left = 50 + radius * Math.cos(angle) + '%';
    image.style.top = 50 + radius * Math.sin(angle) + '%';

    // Increment the angle based on the speed
    angle += speed;

    // Repeat the update function
    requestAnimationFrame(update);
}

// Start the update loop
update();
