<!DOCTYPE html>
<html>
<head>
    <title>One-Page Website</title>
	<style type="text/css">
	.section {
    padding: 50px;
    background-color: #f4f4f4;
    border-bottom: 1px solid #ccc;
	}

	/* Style the container to take the full viewport height */
	#content-container {
    height: 100vh;
    overflow-y: scroll;
	}
	/* Style for the navigation bar */
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
	</style>
</head>
<body>
	<div class="navbar">
        <a href="#home">Home</a>
        <a href="#books">Books</a>
        <a href="#about">About Us</a>
        <a href="#contact">Contact Us</a>
    </div>
    <div id="content-container">
        <!-- First Page -->
		<iframe src="section1.html" width="100%" height="400px" frameborder="0"></iframe>
		<!-- Second Page -->
		<iframe src="section2.html" width="100%" height="400px" frameborder="0"></iframe>
    </div>
    <script src="load-pages.js"></script>
	<script>
        window.addEventListener('load', function () {
            // List of section HTML files
            const sectionFiles = ['section1.html', 'section2.html'];

            const contentContainer = document.getElementById('content-container');

            // Load and append each section's content
            sectionFiles.forEach(function (file) {
                fetch(file)
                    .then(response => response.text())
                    .then(content => {
                        const sectionDiv = document.createElement('div');
                        sectionDiv.innerHTML = content;
                        contentContainer.appendChild(sectionDiv);
                    })
                    .catch(error => console.error('Error loading section:', error));
            });
        });
    </script>
</body>
</html>
