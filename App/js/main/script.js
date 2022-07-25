const selections = document.querySelectorAll('.selection');
let selectionsIntersecting = false;
let elements = [];

class Selection {
    currentSize = .8;
    maxSize = 1;
    rate = .005;
    constructor(el){
        this.el = el;
    }
    addSize(){
        this.currentSize += this.rate;
    }
    showSize(){
        this.el.style.transform = `scale(${this.currentSize})`;
    }
}

window.addEventListener('scroll', function(){
    if(!elements.length || !selectionsIntersecting) return;
    elements.forEach(e => {
        if(e.currentSize >= e.maxSize){
            return;
        }
        e.addSize();
        e.showSize();
    })
});

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            // selectionsIntersecting = true;
            // elements.push(new Selection(entry.target));
            entry.target.classList.add('full');
            observer.unobserve(entry.target);
        }
    });
}, {
    // threshold: 0
    threshold: .5,
})

selections.forEach(s => {
    observer.observe(s);
})
