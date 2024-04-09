fetch('http://127.0.0.1:8000/api/get/product/faq/ans', {
    method: 'GET', // or POST, PUT, DELETE, etc.
    headers: {
      'Content-Type': 'application/json', // Set the appropriate content type
      // Add any additional headers if needed
    },
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json(); // or response.text(), response.blob(), etc.
    })
    .then((data) => {
      // Handle the received data here
      console.log(data);
      // Target the div element
      const responseDataDiv = document.getElementById('responseData');
        var res = Object.entries(data);
        var product_faq ='';
        for(i=0;i<res.length;i++){
            // console.log('result->>>>>>>>>>>>for loop',res[i][1].faq_qus);
            product_faq +=  '<div class="accordion"><div class="accordion-item"><div class="accordion-header" onclick="toggleAccordion(this)">' + res[i][1].faq_qus + '</div><div class="accordion-content">' + res[i][1].faq_ans + '</div></div></div>'
        }
        responseDataDiv.innerHTML = product_faq;
    })
    .catch((error) => {
      // Handle errors here
    });
  
    function toggleAccordion(header) {
      // Get the parent accordion item
      var accordionItem = header.parentElement;
    
      // Toggle the "active" class for the clicked item
      accordionItem.classList.toggle('active');
    }

    


    


    

    