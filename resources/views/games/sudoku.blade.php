<!-- resources/views/games/sudoku.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="sudoku-container">
        <h1>Sudoku Puzzle</h1>
        <table id="sudoku-grid"></table>
        <button onclick="checkSudoku()">Check Puzzle</button>
    </div>
    <script>
        const sudokuSolution = [
            // Add your Sudoku solution here (same as your existing script)
        ];

        function generateGrid() {
            const table = document.getElementById("sudoku-grid");
            for (let row = 0; row < 9; row++) {
                let tr = document.createElement("tr");
                for (let col = 0; col < 9; col++) {
                    let td = document.createElement("td");
                    let input = document.createElement("input");
                    input.type = "text";
                    input.maxLength = 1;
                    input.dataset.row = row;
                    input.dataset.col = col;

                    if (sudokuSolution[row][col] !== 0) {
                        input.value = sudokuSolution[row][col];
                        input.disabled = true;
                    }

                    input.addEventListener("input", function() {
                        validateInput(input);
                    });

                    td.appendChild(input);
                    tr.appendChild(td);
                }
                table.appendChild(tr);
            }
        }

        function validateInput(input) {
            if (!/[1-9]/.test(input.value)) {
                input.value = '';
            }
        }

        function checkSudoku() {
            let userSolution = [];
            let isValid = true;
            let inputs = document.querySelectorAll("input[type='text']");
            inputs.forEach(input => {
                let row = input.dataset.row;
                let col = input.dataset.col;
                if (!userSolution[row]) userSolution[row] = [];
                userSolution[row][col] = parseInt(input.value) || 0;
            });

            for (let i = 0; i < 9; i++) {
                if (!checkRow(userSolution, i) || !checkCol(userSolution, i) || !checkGrid(userSolution, i)) {
                    isValid = false;
                    break;
                }
            }

            if (isValid) {
                alert("Congratulations! You've solved the puzzle!");
            } else {
                alert("The solution is incorrect. Please try again.");
            }
        }

        function checkRow(solution, row) {
            let seen = new Set();
            for (let col = 0; col < 9; col++) {
                let val = solution[row][col];
                if (val === 0) continue;
                if (seen.has(val)) return false;
                seen.add(val);
            }
            return true;
        }

        function checkCol(solution, col) {
            let seen = new Set();
            for (let row = 0; row < 9; row++) {
                let val = solution[row][col];
                if (val === 0) continue;
                if (seen.has(val)) return false;
                seen.add(val);
            }
            return true;
        }

        function checkGrid(solution, grid) {
            let seen = new Set();
            let startRow = Math.floor(grid / 3) * 3;
            let startCol = (grid % 3) * 3;

            for (let row = startRow; row < startRow + 3; row++) {
                for (let col = startCol; col < startCol + 3; col++) {
                    let val = solution[row][col];
                    if (val === 0) continue;
                    if (seen.has(val)) return false;
                    seen.add(val);
                }
            }
            return true;
        }

        generateGrid();
    </script>
@endsection
