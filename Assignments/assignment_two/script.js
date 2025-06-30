   
    // card discount logic

  document.querySelectorAll('.food-card').forEach(card => {
    const regular = parseFloat(card.dataset.regular);
    const discount = parseFloat(card.dataset.discount);

    const regularPriceElem = card.querySelector('.regular-price');
    const discountPriceElem = card.querySelector('.discount-price');
    const badgeElem = card.querySelector('.discount-badge');

    // Update price display
    regularPriceElem.innerText = `৳${regular}`;
    discountPriceElem.innerText = `৳${discount}`;

    // Calculate discount percent
    const discountPercent = Math.round(((regular - discount) / regular) * 100);

    // Show discount badge
    badgeElem.innerText = `${discountPercent}% OFF`;
  });



    // Initial cart count
  let cartItemCount = 0;

  // Select all Order Now buttons
  const orderButtons = document.querySelectorAll('.food-card button');

  // Add event listener to each
  orderButtons.forEach(button => {
    button.addEventListener('click', () => {
      cartItemCount++;
      document.getElementById('cartCount').innerText = cartItemCount;
    });
  });

  // Populate prices and discount badge
  document.querySelectorAll('.food-card').forEach(card => {
    const regular = parseFloat(card.dataset.regular);
    const discount = parseFloat(card.dataset.discount);

    const regularPriceElem = card.querySelector('.regular-price');
    const discountPriceElem = card.querySelector('.discount-price');
    const badgeElem = card.querySelector('.discount-badge');

    if (regularPriceElem && discountPriceElem && badgeElem) {
      const discountPercent = Math.round(((regular - discount) / regular) * 100);
      regularPriceElem.innerText = `৳${regular}`;
      discountPriceElem.innerText = `৳${discount}`;
      badgeElem.innerText = `${discountPercent}% OFF`;
    }
  });


