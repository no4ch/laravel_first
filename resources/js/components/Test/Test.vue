<template>
    <div class="container mt-2">
        <div class="test">
            <h1>Test: <strong>{{ test.name}}</strong></h1>
            <h2>Number of questions: <strong>{{ questionsCount }}</strong></h2>

            <br>

            <div class="container mb-3" v-if="questionsCount > 0 && testing">
                <div class="question-image" v-if="test.questions[counter].file">
                    <img :src="'/storage/' + test.questions[counter].file.path" alt="">
                    <hr>
                </div>
                <p>{{ counter+1 }}) Question: <strong>{{test.questions[counter].question}}</strong></p>

                <div class="form-check" v-for="(value, index) in test.questions[counter].answers.length"
                     v-if="test.questions[counter].answers.length > 0">

                    <label class="form-check-label cursor-pointer pt-1 pb-1" :for="index">
                        <input class="form-check-input" type="radio" :id="index"
                               :value="test.questions[counter].answers[index].id"
                               v-model="possibleAnswer">
                        {{test.questions[counter].answers[index].answer}}
                    </label>
                </div>

                <button type="button" class="btn btn-outline-primary btn-lg mt-3" @click="btnClick">Next</button>
            </div>

            <div class="result" v-if="!testing">
                <h3>The number of correct answers <strong>{{ result }}</strong></h3>
            </div>
            <br><br>
            <a href="/tests" class="btn btn-primary">Back to tests</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['test'],
        name: "Test",
        data() {
            return {
                counter: 0,
                testing: true,
                possibleAnswer: "",
                answers: [],
                questionsCount: this.test.questions.length,
                result: "loading ...",
                endTest: false
            }
        },
        methods: {
            btnClick() {
                let t = this;
                if (t.counter < t.questionsCount - 1) {

                    if (t.possibleAnswer === "") {
                        alert('Choose an answer option')
                    } else {
                        t.answers.push(t.possibleAnswer);
                        t.possibleAnswer = "";
                        t.counter++;
                    }

                } else {
                    t.testing = false;
                    t.counter = 0;
                    //убрать иф
                    if (t.counter < t.questionsCount) {
                        t.answers.push(t.possibleAnswer);
                        t.possibleAnswer = "";
                    }

                    //let answers = JSON.stringify(t.answers);
                    axios.post('/api/results', {
                        answers: this.answers,
                        id: t.test.id
                    })
                    .then(response => {
                        t.checkResults(response.data);
                    })
                    .catch(error => {
                        //запилить ошибки
                        console.log(error);
                    });

                }
            },
            checkResults(result) {
                let t = this;

                if (result !== 'error') {
                    console.log(result);
                    t.result = result;
                } else {
                    t.result = 'Error';
                }
                t.endTest = true;
            }
        },
        updated() {
            if (this.endTest) this.$destroy()
        }
    }
</script>

<style scoped>
    .test {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .question-image > img {
        max-height: 250px;
        max-width: 100%;
    }
</style>

