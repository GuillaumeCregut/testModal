import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['myBackground', 'myDialog'];
    close () {
        this.myBackgroundTarget.style.display = 'none';
        this.myDialogTarget.close();
    }

    open() {
        console.log(this.element);
        console.log(this.myBackgroundTarget);
        this.myBackgroundTarget.style.display = 'block';
        this.myDialogTarget.showModal();
    }
}