let resultField = document.getElementById('result');

// Tambahkan angka atau operator ke display
function appendToDisplay(value) {
  if (resultField.value === '0') {
    resultField.value = value;
  } else {
    resultField.value += value;
  }
}

// Clear display
function clearDisplay() {
  resultField.value = '0';
}

// Evaluasi ekspresi matematis
function calculate() {
  try {
    let expression = resultField.value.replace('^', '**');
    resultField.value = eval(expression);
  } catch (error) {
    resultField.value = 'Error';
  }
}
