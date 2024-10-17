let todoList = document.getElementById('todo-list');


function addTask() {
  let input = document.getElementById('todo-input');
  let taskText = input.value.trim();

  if (taskText === '') {
    alert('Please enter a task!');
    return;
  }

  let li = document.createElement('li');
  li.className = 'todo-item';

  let span = document.createElement('span');
  span.textContent = taskText;

  let buttonContainer = document.createElement('div');
  buttonContainer.className = 'todo-buttons';

  let editButton = document.createElement('button');
  editButton.textContent = 'Edit';
  editButton.className = 'edit';
  editButton.onclick = () => editTask(span);

  let deleteButton = document.createElement('button');
  deleteButton.textContent = 'Delete';
  deleteButton.className = 'delete';
  deleteButton.onclick = () => deleteTask(li);

  buttonContainer.appendChild(editButton);
  buttonContainer.appendChild(deleteButton);

  li.appendChild(span);
  li.appendChild(buttonContainer);

  todoList.appendChild(li);
  input.value = '';
}


function editTask(span) {
  let newTask = prompt('Edit your task:', span.textContent);
  if (newTask !== null && newTask.trim() !== '') {
    span.textContent = newTask.trim();
  }
}

function deleteTask(task) {
  todoList.removeChild(task);
}
