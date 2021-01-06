<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math was asier than hacking!</title>
</head>    
<body>
    <h2>Math was asier than hacking!</h2>
    <p>This game is a hell of a multiplication table. <br />
    It can never be finished with the brains of ordinary people. <br /><br />
    The game's developer offered to let you know when the number of hits 200,000.<br />
    </p>
    <input type="button" value="Start Game!" onclick="getstrat();">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    function getstrat() {
        gugudan();
    }
        const gugudan = () => {
            const user = {
                correct: 0,
                incorrect: 0,
                time: []
            };
            let max = 8;

            const problem = () => {
                let first, second;

                const setnum = () => {
                    const min = 0.5 * user.correct;
                    max = Math.floor(0.1 * user.correct + max);
                    first = Math.floor(min + Math.random() * max) + 1;
                    second = Math.floor(min + Math.random() * max) + 1;
                };

                const question = () => {
                    const now = new Date();
                    const prm = prompt(`${first} * ${second} = ?`, "");

                    if (prm === null) {
                        const arr = user.time;
                        const max = arr.length;
                        let sum = 0;

                        for(let i = 0; i < max; i++) {
                            sum += arr[i] / 1000
                        }

                        alert(`정답 : ${user.correct}\n오답 : ${user.incorrect}\n평균 : ${(sum/max).toFixed(3)}초`)
                    }
                    else {
                        +prm === (first * second)
                        ? (
                            user.correct++,
                            user.time.push(new Date() - now),
                            setnum(),
                            question()
                        )
                        : (
                            alert("Incorrect!"),
                            user.incorrect++,
                            user.time.push(new Date() - now),
                            question()
                        )
                        if(user.correct >= 200000) {
                            $.post("./flag.php", {name:"math",data:"sksrhdqnfmfwkfgkwldksgsmsek"}, function (data) {
                                alert(data);
                            });
                        }
                    }
                };

                setnum(),
                question();
            }

            problem();
        };
    </script>
</body>
</html>