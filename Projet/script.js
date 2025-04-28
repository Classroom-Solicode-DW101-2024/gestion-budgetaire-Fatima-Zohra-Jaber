
document.getElementById('type').addEventListener('change', function() {
    const type = this.value;

    if (type) {
        fetch('get_categories.php?type=' + type)
            .then(response => response.json())
            .then(data => {
                const categorySelect = document.getElementById('category_id');
                categorySelect.innerHTML = ''; // Vider l'ancien contenu

                if (data.length > 0) {
                    data.forEach(cat => {
                        const option = document.createElement('option');
                        option.value = cat.id;
                        option.textContent = cat.nom;
                        categorySelect.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.textContent = 'Aucune catégorie trouvée';
                    categorySelect.appendChild(option);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    }
});
