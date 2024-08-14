<?php
    session_start();
    if(!isset($_SESSION['isLogin'])){
      header('location:../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Game Classroom</title>
    <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <header style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
      <div class="container gameHubHeader">
        <div class="dashboard">
        <a href="dashboard.php" class="text-decoration-none"><h3 class="display-5 pointer text-center VT323 bg-white ">Game Classroom</h3></a>  
          </div>
          <div class="profile" onclick='btn(this)'>
            <div class="profile_pic pointer">
              
            </div>
            <ul class="profile-settings">
              <li><a href="">LeaderBoards</a></li>
              <li><a href="">Settings</a></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div>
      </div>
       
    </header>
    <main class="container">
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="display-6">Leaderbords</h3>
            </div>
            <div class="card-body">
              <table class="table table-stripped" id="leaderboards">
                <tr>
                  <th>Rank</th>
                  <th>Username</th>
                  <th>Points</th>
                </tr>
              </table>
            </div>
        </div>
    </div>
    </main>

    <script>
        async function displayLeaderboards() {
        try {
            const response = await fetch('process.php');
            const data = await response.json();
            if (!response.ok) {
            throw new Error("Network Error.");
            }

            leaderboards.innerHTML = ""; // Clear existing data
            if (data.error) {
            leaderboards.innerHTML = `<tr><td>${data.error}</td></tr>`;
            } else if (data.message) {
            leaderboards.innerHTML = `<tr><td>${data.message}</td></tr>`;
            } else {
            leaderboards.innerHTML = data.map((item, index) =>
                `<tr>
                <td>${index + 1}</td>
                <td>${item.username}</td>
                <td>${item.guessPoints}</td>
                </tr>`
            ).join("");
            }
        } catch (error) {
            leaderboards.innerHTML = `<p class="text-center display-6 mt-5">No one is on the board!</p>`;
        }
        }

        displayLeaderboards();

        function btn(elem){
          elem.lastElementChild.classList.toggle('active');
        }
    </script>
  </body>
</html>