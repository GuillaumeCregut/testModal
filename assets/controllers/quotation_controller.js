import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets= ['ttcPrice','htPrice', 'htTotalPrice','ttcTotalPrice'];

    updatePrice(event) {
        let ttcPrice = 0;
        this.ttcPriceTargets.forEach((price)=>{
            ttcPrice+=parseFloat(price.dataset.value);
        })
        this.ttcTotalPriceTarget.textContent = ttcPrice.toFixed(2);

        let htPrice = 0;
        this.htPriceTargets.forEach((price)=>{
            htPrice+=parseFloat(price.dataset.value);
        })
        this.htTotalPriceTarget.textContent = htPrice.toFixed(2);
    }
}