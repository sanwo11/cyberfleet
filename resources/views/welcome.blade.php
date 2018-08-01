<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<div class="row">
    <div class="col-4 offset-4">
        <div class="card">
            <div class="card-body">
                <ol>

                    @foreach($questions['question'] as $question)
                        <li>
                            {{ $question['question'] }}
                            {{ $question['correctOption'] }}
                            @foreach($question['options']['option'] as $index => $option)
                            <div class="form-check">
                                <input type="radio" id="{{ $question['index'] . "_" . $option['index']  }}" name="Q{{ $question['index'] }}" class="{{ $question['correctOption'] == (int) $option['index'] ? 'correct' : 'wrong' }} form-check-input position-static optionRadio">
                                <label class="form-check-label" for="{{ $question['index'] . "_" . $option['index']  }}">
                                    {{ $option['optionText'] }}
                                </label>
                            </div>
                            @endforeach
                        </li>
                    @endforeach
                </ol>

                <button class="btn btn-primary" disabled>PREVIOUS</button>
                <button class="btn btn-primary" disabled>NEXT</button>
                <button class="btn btn-primary" onclick="submit()">SUBMIT QUIZ</button>

                <hr>

                <h3 class="text-right" style="display: none" id="result">
                    <strong>SCORE: <span class="correct"></span> out of {{ count($questions['question']) }}</strong>
                </h3>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<script>
    var score = 0;

    function submit() {
        var correct = $('.optionRadio.correct:checked').length;

        $(".correct").html(correct);
        document.getElementById("result").style.display="block";
    }

</script>
</body>
</html>
