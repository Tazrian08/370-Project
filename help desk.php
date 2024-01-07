<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help desk</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="About the site"/>
	<meta name="author" content="Author name"/>

	<!-- core CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Times New Roman, Serif Typeface;
            background-color: #f0f0f0;
            margin: 30;
            padding: 30;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
             background-color: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			margin-top: 10vh;
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
		body {
            overflow-y: scroll; /* Always show vertical scrollbar to prevent layout shifts */
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
			margin-bottom: 20px; /* Add margin to create space between search bar and questions */
        }

        .search-bar {
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 30px;
            width: 70%;
            max-width: 400px;
            font-size: 16px;
            outline: none;
			margin-right: 10px;
        }

        .search-button {
            padding: 12px 24px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .search-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .question {
            font-weight: bold;
            cursor: pointer;
            padding: 12px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 15px;
			margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s, transform 0.2s;
			
        
        }

        .question:hover {
            background-color: #e0e0e0;
            transform: scale(1.01);
        }

        .question span {
            font-size: 20px;
            transition: transform 0.2s;
        }

        .question:hover span {
            transform: rotate(90deg);
        }
		.question .arrow-icon {
            width: 20px;
            height: 20px;
            transition: transform 0.1s;
        }

        .question.open .arrow-icon {
            transform: rotate(90deg);
        }

        .answer {
            display: none;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
			margin-bottom : 10px;
           
        }
/* Add background image */
        body {
            background-image: url('patels.jpg'); /* Replace with your image filename */
            background-size: cover;
            background-repeat: no-repeat;
			height: 100%;
			width: 100%;
        }
        /* Navigation bar styles */
        .navbar {
            overflow: hidden;
            background-color: #333;
			z-index: 1200;
			
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 20px 22px;
            text-decoration: none;
			font-size: 20px;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
		.navbar-right {
		float: right;
		}
    </style>
    <script>
        function toggleAllAnswers() {
            var answers = document.querySelectorAll(".answer");
            answers.forEach(function(answer) {
                answer.style.display = "none";
            });
        }

        function toggleAnswer(element) {
            var answer = element.nextElementSibling;
            if (answer.style.display === "none") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }

        function searchQuestions() {
            toggleAllAnswers(); // Hide all answers before the search

            var input = document.getElementById("search-input").value.toLowerCase();
            var questions = document.getElementsByClassName("question");

            for (var i = 0; i < questions.length; i++) {
                var questionText = questions[i].textContent.toLowerCase();
                var answer = questions[i].nextElementSibling.textContent.toLowerCase();

                if (questionText.includes(input) || answer.includes(input)) {
                    questions[i].style.display = "flex";
                } else {
                    questions[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<header>
	<div class="navbar">
  <a href="">Online Library Management System</a>
	<a href="test.php">Home</a>
    <a href="Books.php">Our Bookshelf</a>
</div>
</header>
<body>

	<br><br><br>
     <div class="container">
        <h1>How Can We Help?</h1>
        
        <div class="search-container">
            <input type="text" id="search-input" class="search-bar" placeholder="Ask a question...">
            <button class="search-button" onclick="searchQuestions()">Search</button>
        </div>
        
        
        <?php
        $faqData = array(
            array(
                "question" => "How do I borrow books?",
                "answer" => "To borrow books, visit the library's circulation desk and provide your library card."
            ),
            array(
                "question" => "Can I renew my borrowed books online?",
                "answer" => "Yes, you can renew your borrowed books by logging into your library account on our website."
            ),
            array(
                "question" => "What is the loan period for books?",
                "answer" => "The loan period for most books is two weeks. Some reference materials may have shorter loan periods."
            ),
            array(
                "question" => "How can I reserve a book that's currently checked out?",
                "answer" => "You can place a hold on a checked-out book through our website or by asking a librarian for assistance."
            ),
            array(
                "question" => "Do you have e-books available for borrowing?",
                "answer" => "Yes, we offer a selection of e-books that you can borrow and read on your preferred device."
            ),
            array(
                "question" => "How can I access online databases?",
                "answer" => "You can access our online databases by logging into your library account on our website and navigating to the 'Resources' section."
            ),
            // Add more questions and answers here
        );

        foreach ($faqData as $faq): ?>
            <div class="question" onclick="toggleAnswer(this)">
                <?php echo $faq["question"]; ?>
                <span>&#9660;</span>
            </div>
            <div class="answer">
                <?php echo $faq["answer"]; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
