var cardNumber = document.getElementById('txtNumero');
        var divBrand = document.getElementById('result')

        cardNumber.addEventListener("keyup", brand, true);

        function brand() {
            var numCartao = cardNumber.value
            if (numCartao.length >= 6) {
                var oneDig = numCartao.substr(0, 1);
                var twoDig = numCartao.substr(0, 2);
                if (twoDig == 34 || twoDig == 37) {
                    divBrand.innerHTML = "<i class='fa fa-cc-amex amex size'></i>";
                } else if (oneDig == 4) {
                    divBrand.innerHTML = "<i class='fa fa-cc-visa visa size'></i></i>";
                } else if (twoDig == 51 || twoDig == 52 || twoDig == 53 || twoDig == 54 || twoDig == 55) {
                    divBrand.innerHTML = "<i class='fa fa-cc-mastercard mastercard size'></i></i>";
                } else {
                    divBrand.innerHTML = "<i class='fa fa-credit-card size red'></i>";
                }
            } else {
                divBrand.innerHTML = "<i class='fa fa-credit-card size'></i>";
            }
        }