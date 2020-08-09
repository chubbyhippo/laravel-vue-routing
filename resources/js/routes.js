import VueRouter from "vue-router";
import ExampleComponent from "./components/ExampleComponent.vue";

const test = { template: "<div>test</div>" };

let routes = [
    {
        path: "/",
        component: require("./components/ExampleComponent.vue").default
        // component: test
        // component: ExampleComponent
    },
    {
        path: "/about",
        component: require("./components/About.vue").default
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: "is-active"
});
