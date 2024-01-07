<script>
    const returnButtons = document.querySelectorAll('.return-button');
    const confirmReturnButton = document.getElementById('confirm-return');
    const savedBooks = [];

    returnButtons.forEach(button => {
        button.addEventListener('click', () => {
            const bookId = button.getAttribute('data-book-id');
            const title = button.getAttribute('data-title');
            savedBooks.push({ bookId, title });

            button.disabled = true;
            button.classList.add('disable-click');
        });
    });

    confirmReturnButton.addEventListener('click', () => {
        if (savedBooks.length === 0) {
            alert('Click on return button first.');
        } else {
            const bookIds = savedBooks.map(book => book.bookId);
            window.location.href = `return.php?book_ids=${bookIds.join(',')}`;
        }
    });
</script>