<template>
  <div class="container mt-2">
    <div class="test">
      <h1>Test: <strong>{{ test.name}}</strong></h1>
      <h2>Number of questions: <strong>{{ questionsCount }}</strong></h2>

      <br><br>

      <div class="container mb-3" v-if="questionsCount > 0">
        <p>{{ counter+1 }}) Question: <strong>{{test.questions[counter].question}}</strong></p>

        <div class="form-check pt-2" v-for="(value, index) in test.questions[counter].answers.length"
             v-if="test.questions[counter].answers.length > 0">
          <input class="form-check-input" type="radio" :id="index" :value="index" v-model="possibleAnswer">
          <label class="form-check-label cursor-pointer" :for="index">
            {{test.questions[counter].answers[index].answer}}
          </label>
        </div>

        <button type="button" class="btn btn-primary btn-lg mt-3" @click="btnClick">Next</button>
      </div>
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
        possibleAnswer: "",
        answers: [],
        questionsCount: this.test.questions.length
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
          t.counter = 0;
        }
      }
    },
    watch: {}
  }
</script>

<style scoped>
  .test {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
</style>

