<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1">
  <title>Reviews System</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <link href="reviews.css" rel="stylesheet" type="text/css">
</head>
<body>
  <nav class="navtop">
    <div>
      <h1>Reviews System</h1>
    </div>
  </nav>
  <div class="content home">
    <h2>Reviews</h2>
    <p>Check out the below reviews for our website.</p>
    <div class="reviews"></div>

    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const reviews_page_id = 1;

        fetch(`reviews.php?page_id=${reviews_page_id}`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not OK');
            }
            return response.text();
          })
          .then(data => {
            document.querySelector(".reviews").innerHTML = data;

            const writeReviewBtn = document.querySelector(".reviews .write_review_btn");
            const writeReviewForm = document.querySelector(".reviews .write_review form");

            writeReviewBtn.addEventListener('click', (event) => {
              event.preventDefault();
              document.querySelector(".reviews .write_review").style.display = 'block';
              document.querySelector(".reviews .write_review input[name='name']").focus();
            });

            writeReviewForm.addEventListener('submit', (event) => {
              event.preventDefault();
              fetch(`reviews.php?page_id=${reviews_page_id}`, {
                  method: 'POST',
                  body: new FormData(writeReviewForm)
              })
              .then(response => {
                if (!response.ok) {
                  throw new Error('Network response was not OK');
                }
                return response.text();
              })
              .then(data => {
                document.querySelector(".reviews .write_review").innerHTML = data;
              })
              .catch(error => {
                console.error('Error:', error);
                // Display an error message to the user
              });
            });
          })
          .catch(error => {
            console.error('Error:', error);
            // Display an error message to the user
          });
      });
    </script>
  </div>
</body>
</html>
