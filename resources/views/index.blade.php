<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Folders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
  margin: 0;
  padding: 0;
}

article {
  display: inline-block;
}

body {
  color: #ffffff;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  background-color: #050121f6;
  height: 500vh;
  /* background-image: -webkit-linear-gradient(#050121f6,
  #8b7edf);; */
}

main{
  display: inline-block;
}
 .image{  
  /* display: flex; */
  float: right;
  align-self: flex-start;
  padding: top 5vh;
  
}
#mg{

display: inline-block;
/* display: flex; */

}
.p1 {
  font-size: 2vh;
  padding-left: 10vw;
  padding-top: 15vh;
  font-weight: bold;
  width: 23vw;
}

.p2 {
  font-size: 6vh;
  padding-left: 10vw;
  padding-top: 1vh;
  font-weight: bold;
  display: inline-block;
  width: 40vw;
  box-sizing: border-box;
}
.p3 {
  font-size: 3.5vh;
  padding-top: 1vh;
  padding-left: 10vw;
  color: #288ee8;
  font-weight: bold;
}
.p4 {
  font-size: 1.7vh;

  padding-top: 3vh;
  width: 45vw;
  padding-left: 10vw;
}
.button button {
  background-color: #085da8;
  padding: 2vh;
  color: #ffffff;
  font-weight: bold;
  border-radius: 4vh;
  border: #288ee8;
  font-size: 2vh;
}
.button {
  padding-left: 10vw;
  padding-top: 5vh;
}

.button button:hover {
  color: #000000;
  background-color: #288ee8;
  transition: all 0.2s ease-in-out;
}


    </style>
</head>
<body>
    <main>
        <article>
            <div class="p1">
                - Welcome To the Folders
            </div>

            <div class="p2">
                Click the button to create a root folder
            </div>
            <div class="p3">
                Add new folders
            </div>
            <div class="p4">
                And add new files
            </div>
            <div class="button">
                <form action="/rootfolder" method="post">
                    @csrf
                    <button>Create Root Folder</button>
                </form>
            </div>
        </article>
    </main>
</body>
</html>