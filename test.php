<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <input type="number" id="input" />
        <button id="buttonhi">Calculate</button>
        <p id="output"></p>
    <script>
    const input = document.getElementById('input'),
    button = document.getElementById('buttonhi'),
    output = document.getElementById('output');
    let value = input.valueAsNumber;

    input.oninput = function () {
    value = this.valueAsNumber;
    };

    button.onclick = function () {
    value += 5;
    output.textContent = isNaN(value) ? '' : value;
    };</script>
</body>
</html>