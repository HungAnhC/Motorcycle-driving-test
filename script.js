const answers = document.querySelectorAll('.answer');
const submitBtn = document.getElementById('submit');
const previous = document.getElementById('previous');
const quiz = document.getElementById('question');
let current_question = 0;
let scores = 0;
let shouldRemoveAnswer=true
load_question();
function load_question(){
    if(shouldRemoveAnswer){
        remove_answer();
    }
    submitBtn.disabled=true;
    
    fetch('http://localhost/restful_php_api/api/question/read.php')
    .then(res =>res.json())
    .then(data =>{
        
        console.log(data);
        document.getElementById('total_questions').value=data.data.length;
        const question = document.getElementById('title');
        
        const answer_a = document.getElementById('answer_a');
        const answer_b = document.getElementById('answer_b');
        const answer_c = document.getElementById('answer_c');
        const answer_d = document.getElementById('answer_d');
        // show question and answer
        const get_question = data.data[current_question];
        // console.log(get_question);
        question.innerText = get_question.title;
        answer_a.innerText = get_question.answer_a;
        answer_b.innerText = get_question.answer_b;
        if(get_question.sentence_c !== null){
            answer_c.innerText = get_question.answer_c; 
            document.getElementById('sentence_c').classList.remove('show_answers');
        }else{
            document.getElementById('sentence_c').classList.add('show_answers');
        }
        
        if(get_question.sentence_d !== null){
            document.getElementById('sentence_d').classList.remove('show_answers');
            answer_d.innerText = get_question.answer_d;
        }else{
            document.getElementById('sentence_d').classList.add('show_answers');
            
        }
        document.getElementById('right_sentence').value=get_question.correct_answer;
        
    })
    .catch(error => console.log(error));
}

// choose answer
function get_answer(){
    let selectAnswer = undefined;
    answers.forEach((answer) => {
        if(answer.checked){
            selectAnswer =  answer.id;
        }
    })
    return selectAnswer;
}
// cancel previous answer
function remove_answer(){
    answers.forEach((answer) => {
        answer.checked= false;
    })
}


// check to next question
answers.forEach((elem) => {
    elem.addEventListener("change",function(event){
        submitBtn.removeAttribute("disabled");
    });
});

// event click submit
submitBtn.addEventListener("click",()=>{
        const chosenAnswer  = get_answer();

        if(chosenAnswer){
            const correctAnswer = document.getElementById('right_sentence').value;
            
            if(chosenAnswer  ===  correctAnswer){
                scores++;

            }
        }
        current_question ++;

        load_question();
        if(current_question<document.getElementById('total_questions').value){
            
        }else{
            const total_questions =document.getElementById('total_questions').value;

            quiz.innerHTML = `
                <h2> Bạn đã đúng ${scores}/${total_questions} câu hỏi </h2>
                <button onclick = "location.reload()">Làm lại bài</button>
            
            `
        }
    
}
)
// previous.addEventListener("click",()=>{
//     current_question --;
//     shouldRemoveAnswer = false;
//     load_question();
    
// })