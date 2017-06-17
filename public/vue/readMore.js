Vue.component('todo-item', {
    props: ['todo'],
    template: '<li>{{ todo }}</li>'
})
var app7 = new Vue({
    el: '#app-7',
    data: {
        groceryList: [
            { text: 'Vegetables' },
            { text: 'Cheese' },
            { text: 'Whatever else humans are supposed to eat' }
        ],
        a:[]
    }
})