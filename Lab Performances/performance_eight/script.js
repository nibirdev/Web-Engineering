  //   let count = 0;
  //   function addToCart() {
  //     count++;
  //     document.getElementById('cartCount').innerText = count;
  //   }

  //   // card discount logic

  // document.querySelectorAll('.food-card').forEach(card => {
  //   const regular = parseFloat(card.dataset.regular);
  //   const discount = parseFloat(card.dataset.discount);

  //   const regularPriceElem = card.querySelector('.regular-price');
  //   const discountPriceElem = card.querySelector('.discount-price');
  //   const badgeElem = card.querySelector('.discount-badge');

  //   // Update price display
  //   regularPriceElem.innerText = `৳${regular}`;
  //   discountPriceElem.innerText = `৳${discount}`;

  //   // Calculate discount percent
  //   const discountPercent = Math.round(((regular - discount) / regular) * 100);

  //   // Show discount badge
  //   badgeElem.innerText = `${discountPercent}% OFF`;
  // });


  let count = 0;
  function addToCart() {
    count++;
    document.getElementById('cartCount').innerText = count;
  }
  
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
    badgeElem.innerText = `${discountPercent}% OFF`;
  
    // Update form hidden input values
    const form = card.querySelector('form');
    if (form) {
      const regularInput = form.querySelector('input[name="regular_price"]');
      const discountInput = form.querySelector('input[name="discount_price"]');
      if (regularInput) regularInput.value = regular;
      if (discountInput) discountInput.value = discount;
    }
  });
  