const header = docuemnt.querySelector('header');
function fixedNavbar(){
    header.classlist.toggle('scroll', window.pageYOffset > 0)
}
fixedNavbar();
window.addEventListener('scroll',fixedNavbar);

let  userBtn = document.querySelector('#user-btn');


userBtn.addEventListener('click', function () {
        let userBox = document.querySelector('.user-box');
        userBox.classlist.toggle('active');
    })


    document.addEventListener("DOMContentLoaded", function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        quantityInputs.forEach(input => {
            input.addEventListener('change', updateTotal);
        });
    
        function updateTotal() {
            let total = 0;
            quantityInputs.forEach(input => {
                const price = parseFloat(input.parentElement.parentElement.querySelector('.price').textContent.replace('Price: $', ''));
                const quantity = parseInt(input.value);
                total += price * quantity;
            });
            document.querySelector('footer p').textContent = `Total: $${total.toFixed(2)}`;
        }
    });
    