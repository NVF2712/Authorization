<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Личный кабинет</title>

  <style>
    body {
      background-color: rgb(253, 158, 123);
      font-size: 1.2rem;
    }

    p {
      font-weight: bold;
    }

    span {
      margin-left: 0.5rem;
    }

    p>span:nth-child(1) {
      font-style: italic;
      color: brown;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-9 mx-auto">

        <p>ID:
          <span><?php echo $_SESSION["id"]; ?> </span>
        </p>

        <p>Имя:
          <span><?= $_SESSION["name"]; ?></span>
          <span class="edit-btn btn btn-warning">Edit</span>
          <span class="save-btn btn btn-success" hidden>Save</span>
          <span class="cancel-btn btn btn-danger" hidden>Cancel</span>
        </p>

        <p>Фамилия:
          <span><?php echo $_SESSION["lastname"]; ?></span>
          <span class="edit-btn btn btn-warning">Edit</span>
          <span class="save-btn btn btn-success" hidden>Save</span>
          <span class="cancel-btn btn btn-danger" hidden>Cancel</span>
        </p>

        <p>E-mail:
          <span> <?php echo $_SESSION["email"]; ?> </span>
        </p>

      </div>

    </div>
  </div>
  <script>
		let edit_buttons = document.querySelectorAll(".edit-btn");
		let save_buttons = document.querySelectorAll(".save-btn");
		let cancel_buttons = document.querySelectorAll(".cancel-btn");

		for (let i = 0; i < edit_buttons.length; i++) {
			let inputValue = edit_buttons[i].previousElementSibling.innerText;

			edit_buttons[i].addEventListener("click", () => {
				edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" value="${inputValue}" id="newValue">`;
				save_buttons[i].hidden = false;
				cancel_buttons[i].hidden = false;
				edit_buttons[i].hidden = true;
			});
      if (save_buttons[i].hidden) {
        save_buttons[i].addEventListener("click", () => {
				//inputValue=document.getElementById(newValue).value; - не заработало так...
				save_buttons[i].hidden = true;
				cancel_buttons[i].hidden = true;
				edit_buttons[i].hidden = false;
        });
      }
      if (cancel_buttons[i].hidden) {
        cancel_buttons[i].addEventListener("click", () => {
				save_buttons[i].hidden = true;
				cancel_buttons[i].hidden = true;
				edit_buttons[i].hidden = false;
        })
      }
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
