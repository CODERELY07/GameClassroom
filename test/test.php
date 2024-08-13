<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Example</title>
</head>
<body>
    <h1>User Data</h1>
    <div id="data-container"></div>

    <script>
        async function fetchData() {
            try {
                // Make the fetch request to the PHP script
                const response = await fetch('data.php');
                
                // Check if the response is okay
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                // Parse the JSON data
                const data = await response.json();

                // Get the container element
                const container = document.getElementById('data-container');

                // Check if there is an error or message
                if (data.error) {
                    container.innerHTML = `<p>Error: ${data.error}</p>`;
                } else if (data.message) {
                    container.innerHTML = `<p>${data.message}</p>`;
                } else {
                    // Display data
                    container.innerHTML = '<ul>' + 
                        data.map(item => `<li>ID: ${item.id}, Name: ${item.username}, Email: ${item.password}</li>`).join('') +
                        '</ul>';
                }
            } catch (error) {
                console.error('Fetch error:', error);
                document.getElementById('data-container').innerHTML = `<p>Error fetching data</p>`;
            }
        }

        // Fetch data when the page loads
        fetchData();
    </script>
</body>
</html>
