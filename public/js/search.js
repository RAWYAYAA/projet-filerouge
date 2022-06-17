// let form = document.querySelector('form')
// let taskInput = document.querySelector('#task_input')
// let taskContainer = document.getElementById('task_container')
// let deleteIcons = document.getElementsByClassName('delete')
// let search = document.getElementById('search')


// form.addEventListener('submit', function(e) {
//   e.preventDefault()
//   if(taskInput.value == '') {
//     return
//   }

//   let task = `
//     <div class="flex justify-between p-2 bg-indigo-600 w-full">
//       <p class="task_txt">${taskInput.value}</p>
//       <i class="bi bi-trash3-fill delete"></i>
//     </div>
//   `
//   taskContainer.insertAdjacentHTML('beforeend', task)
//   taskInput.value = ''

//   for(let icon of deleteIcons) {
//     icon.addEventListener('click', function(e) {
//       e.target.parentElement.remove()
//     })
//   }
// })

// search.addEventListener('input', function() {
//   let tasks = document.querySelectorAll('.task_txt')
//   for(let task of tasks) {
//     if(task.textContent.toLowerCase().startsWith(search.value.toLowerCase())) {
//       task.parentElement.classList.add('flex')
//       task.parentElement.classList.remove('hidden')
//     } else {
//       task.parentElement.classList.remove('flex')
//       task.parentElement.classList.add('hidden')
//     }
//   }
// })