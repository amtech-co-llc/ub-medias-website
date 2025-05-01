function autoLinkify(text = '') {
    return text
        // Match URLs starting with http:// or https:// or www.
        .replace(
            /(\b(?:https?:\/\/|www\.)[^\s<]+)/gi,
            function (match) {
                const href = match.startsWith('http') ? match : 'http://' + match;
                return `<a href="${href}" style="color:#029bd8;font-weight:bold;" target="_blank" rel="noopener noreferrer">${match}</a>`;
            }
        )
        // Match plain domain names (example.com, amtech-co.org, etc.)
        .replace(
            /(^|[\s>])((?:[a-z0-9-]+\.)+[a-z]{2,})(?=[\s<])/gi,
            '$1<a href="http://$2" style="color:#029bd8;font-weight:bold;" target="_blank" rel="noopener noreferrer">$2</a>'
        )
        // Match hashtags with Unicode, accents, emojis, dashes, etc.
        .replace(
            /(^|\s)#([\p{L}\p{N}_\-🌍-🎉🔥💡💻🚀✨❤️💥👍😎👨‍💻👩‍💻🏆✅]+)(?=\s|$)/gu,
            '$1<a href="../../hashtags/$2" style="color:#029bd8;font-weight:bold;text-decoration: none;">#$2</a>'
        )
        // Match @mentions
        .replace(
            /(^|\s)@(\w+)/g,
            '$1<a href="/users/$2" style="color:#029bd8;font-weight:bold;text-decoration: none;">@$2</a>'
        );
}

const text_place = document.querySelector('.article-content');
const text_area = document.getElementById('text-area');
const title_art = document.getElementById('title-art');
const titre = document.querySelector('.titre');
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');

text_area.addEventListener('input', () => {
    const textValue = text_area.value;
    text_place.innerHTML = autoLinkify(textValue.replace(/\n/g, '<br>'));
});

title_art.addEventListener('input', () => {
    const textvalue = title_art.value;
    titre.innerHTML = autoLinkify(textvalue.replace(/\n/g, '<br>'));
});

document.querySelectorAll('.article-content').forEach(el => {
    const originalText = el.textContent;
    el.innerHTML = autoLinkify(originalText);
});

document.querySelectorAll('.article-content2').forEach(el => {
    const originalText = el.textContent;
    el.innerHTML = autoLinkify(originalText);
});

imageInput.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function () {
            imagePreview.setAttribute('src', this.result);
            imagePreview.style.display = 'block';
        });

        reader.readAsDataURL(file); // Convert image file to base64 string
    } else {
        imagePreview.style.display = 'none';
        imagePreview.setAttribute('src', '');
    }
});
