// Define the function to update circles with product data
// Update circles with product data
function updateCircles(data) {
    var productContainer = document.getElementById('product-container');
    productContainer.innerHTML = '';

    data.forEach(function(product) {
        var percentage = product.quantity; // Assuming the quantity directly represents the percentage

        var circleHtml = `
            <div class="circle-wrap">
                <div class="circle">
                    <div class="mask full-1" style="transform: rotate(${percentage * 3.6}deg);"></div>
                    <div class="mask half"></div>
                    <div class="inside-circle">${percentage}%</div>
                </div>
                <div class="product-name">${product.name}</div>
            </div>
        `;
        productContainer.innerHTML += circleHtml;
    });
}


// Function to calculate the stroke dash array based on quantity
function getDashArray(quantity) {
    var circumference = 2 * Math.PI * 60; // Radius is 60
    var percentage = quantity / 100;
    var dashLength = percentage * circumference;
    return dashLength + ' ' + circumference;
}

// Function to determine the stroke color based on quantity
function getStrokeColor(quantity) {
    if (quantity < 30) {
        return '#ec0c0c'; // Red
    } else if (quantity < 70) {
        return 'yellow';
    } else {
        return '#23b9ea'; // Blue
    }
}

// Fetch product data from server
fetch('<?php echo URLROOT; ?>/products/fetchProductData') // Assuming 'products' is the route to your Products controller
    .then(response => response.json())
    .then(data => {
        // Update circles with product data
        updateCircles(data);
    })
    .catch(error => console.error('Error fetching product data', error))
