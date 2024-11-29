import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['htPrice', 'ttcPrice', 'price', 'quantity', 'vat', 'discount', 'description', 'designation'];
    changePrice(event) {
        const price = this.priceTarget.value;
        if (isNaN(price)) {
            event.target.value = '';
            console.log('Veuillez entrer un prix valide');
            return;
        }
        console.log('quantité : ' + this.quantityTarget.value);
        this.calculatePrice();
    }

    changeQtty(event) {
        this.calculatePrice();
    }

    changeVat(event) {
        this.calculatePrice();
    }

    changeDiscount(event) {
        this.calculatePrice();
    }
    calculatePrice() {
        const price = this.priceTarget.value ?? 0;
        const qtty = this.quantityTarget.value ?? 0;
        let vat = this.vatTarget.value ?? 0;
        const discount = this.discountTarget.value ?? 0;
        const htPrice = (price * qtty) - discount;
        let ttcPrice;
        if (vat > 0) {
            ttcPrice = htPrice * (1 + vat / 100);
        } else {
            ttcPrice = htPrice;
        }
        this.htPriceTarget.dataset.value = htPrice.toFixed(2);
        this.ttcPriceTarget.dataset.value = ttcPrice.toFixed(2);
        this.displayPrice(htPrice.toFixed(2), ttcPrice.toFixed(2));
    }

    displayPrice(htPrice, ttcPrice) {
        this.ttcPriceTarget.textContent = ttcPrice;
        this.htPriceTarget.textContent = htPrice;
        this.dispatch('updated');
    }

    async changeProduct(event) {
        const product = event.target.value;
        const result = await this.getProduct(product); 
        this.priceTarget.value = result.price;
        this.vatTarget.value = result.tva;
        this.designationTarget.value = result.designation;
        this.descriptionTarget.value = result.description;
    }

    async getProduct(productId) {
        const url = '/quotations/api/product/';
        console.log(`${url}${productId}`);
        return  await fetch(`${url}${productId}`, {
            method: 'GET',
            headers: { "X-Requested-with": "XMLHttpRequest" },
        }).then(response =>{
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        
    }
}