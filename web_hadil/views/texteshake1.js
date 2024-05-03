let amplitude = 5; // Shaking amplitude (in pixels)
        let frequency = 1; // Shaking frequency (in milliseconds)
        let direction = 1; // Direction of shaking

        // Get the floating text element
        const floatingText = document.getElementById('floatingText1');

        // Function to create a shaking effect
        function shake() {
            // Calculate the new position for the text
            const newX = parseFloat(floatingText.style.left || '50%') + direction * amplitude;
            const newY = parseFloat(floatingText.style.top || '50%') + direction * amplitude;

            // Update the style properties of the floating text
            floatingText.style.left = newX + 10;
            floatingText.style.top = newY + 10;

            // Toggle the direction for the next shake
            direction *= -1;

            // Schedule the next shake
            setTimeout(shake, frequency);
        }

        // Start the shaking effect
        shake();