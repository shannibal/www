var gym = {
    __sets: {},
    __exercises: {},
    Exercise: 
        class Exercise {
            constructor(data) {
                this.id = Number(data.exercise_id);
                this.name = data.exercise_name;
                this.parent = Number(data.exercise_parent);
                this.pr = Number(data.exercise_pr);
                this.elem;
                gym.__exercises[this.id] = this;
            }
        },

    Set:
        class Set {
            constructor(data) {
                this.id = Number(data.set_id);
                this._exercise = Number(data.set_exercise);
                this.percent = Number(data.set_percent);
                this.parent = Number(data.set_parent);
                this.repetition = Number(data.set_repetition);
                this.value = Number(data.set_value);
                gym.__sets[this.id] = this;
            }
    },

    get_exercises: function() {
        return gym.__exercises;
    },

    get_sets: function() {
        return gym.__sets;
    }
};

gym.Exercise.prototype.toString = function() {
    return `
        <div class="row exercise">
            <div class="col s12 exercise_top" id="${this.name}">${this.name}</div>
        </div> 
    `;
}

gym.Set.prototype.toString = function() {
    return `
        <div class="row set">
            <div class="col s3">${this.id}</div>
            <div class="col s3">&nbsp;</div> 
            <div class="col s3">${this.value} x ${this.repetition}</div> 
            <div class="col s3">${((this.percent/100) * this.exercise.pr).toFixed(0)} kg</div>
        </div>
    `;
}


Object.defineProperty(gym.Set.prototype, "exercise", {
    get: function() {
        return (this._exercise in gym.__exercises) ? gym.__exercises[this._exercise] : this._exercise;
    }
});

gym.Exercise.prototype.speak = function() {
  return this;
}
