define(class Item {
    constructor(data) {
        this.id = Number(data.exercise_id);
        this.name = data.exercise_name;
        this.parent = Number(data.exercise_parent);
        this.pr = Number(data.exercise_pr);
        this.elem;
        gym.__exercises[this.id] = this;
    }
});