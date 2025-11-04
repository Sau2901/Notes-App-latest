<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notes App</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    header {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: center;
      background: rgba(255,255,255,0.15);
      padding: 12px;
    }

    nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
      transition: 0.3s;
    }

    nav a:hover {
      color: #ffc107;
      transform: scale(1.1);
    }

    .container {
      max-width: 900px;
      background: #fff;
      margin: 30px auto;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    h1 {
      text-align: center;
      color: #0d6efd;
      text-transform: uppercase;
      margin-bottom: 25px;
    }

    h2 {
      color: #0d6efd;
      margin-bottom: 15px;
    }

    textarea {
      padding: 14px;
      border: 2px solid #0d6efd;
      border-radius: 10px;
      font-size: 15px;
      resize: vertical;
      min-height: 120px;
      margin-bottom: 14px;
      width: 100%;
    }

    button {
      background: linear-gradient(135deg, #0d6efd, #6610f2);
      color: white;
      border: none;
      padding: 10px 18px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      font-weight: bold;
    }

    button:hover {
      background: linear-gradient(135deg, #6610f2, #0d6efd);
    }

    .notes-box {
      background: #f8f9fa;
      padding: 15px;
      border-radius: 12px;
      border: 1px solid #ddd;
      max-height: 400px;
      overflow-y: auto;
    }

    .note {
      background: white;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 12px;
      margin-bottom: 10px;
      position: relative;
    }

    .note-actions {
      position: absolute;
      top: 8px;
      right: 10px;
    }

    .note-actions button {
      background: none;
      color: #6610f2;
      border: none;
      font-size: 14px;
      cursor: pointer;
      margin-left: 5px;
    }

    .note-actions button:hover {
      color: #0d6efd;
    }

    .footer {
      text-align: center;
      margin: 20px 0;
      color: white;
      font-size: 14px;
    }

    .search-bar {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 2px solid #0d6efd;
      border-radius: 8px;
      font-size: 15px;
    }

    .hidden { display: none; }
  </style>
</head>

<body>
  <header>
    <h1>Notes App</h1>
  </header>

  <nav>
    <a href="#" onclick="showPage('home')">Home</a>
    <a href="#" onclick="showPage('notes')">Notes</a>
    <a href="#" onclick="showPage('about')">About</a>
    <a href="#" onclick="showPage('contact')">Contact</a>
  </nav>

  <div class="container">
    <!-- Home -->
    <div id="home" class="page">
      <h2>Welcome!</h2>
      <p>This Notes App helps you create, edit, delete, and search notes — all dynamically without reloading.</p>
    </div>

    <!-- Notes -->
    <div id="notes" class="page hidden">
      <h2>Your Notes</h2>
      <textarea id="noteInput" placeholder="Write your note here..."></textarea>
      <button onclick="addNote()">💾 Save Note</button>
      <input type="text" id="searchInput" class="search-bar" placeholder="🔍 Search notes..." onkeyup="searchNotes()">

      <div class="notes-box" id="notesBox"></div>
    </div>

    <!-- About -->
    <div id="about" class="page hidden">
      <h2>About</h2>
      <p>Created by <b>Saurav Kumar</b>. A simple PHP & JS-based Notes App that saves, edits, deletes, and searches notes dynamically.</p>
    </div>

    <!-- Contact -->
    <div id="contact" class="page hidden">
      <h2>Contact</h2>
      <p><b>Email:</b> saurav@example.com</p>
      <p><b>GitHub:</b> <a href="https://github.com/Sau2901" target="_blank">github.com/Sau2901</a></p>
    </div>
  </div>

  <div class="footer">
    Made with ❤️ by <span>Saurav Kumar</span>
  </div>

  <script>
    let notes = JSON.parse(localStorage.getItem("notes")) || [];
    let editIndex = null;

    function showPage(pageId) {
      document.querySelectorAll('.page').forEach(p => p.classList.add('hidden'));
      document.getElementById(pageId).classList.remove('hidden');
    }

    function renderNotes() {
      const box = document.getElementById("notesBox");
      box.innerHTML = "";
      if (notes.length === 0) {
        box.innerHTML = "<i>No notes yet. Start writing!</i>";
        return;
      }
      notes.forEach((note, i) => {
        const div = document.createElement("div");
        div.className = "note";
        div.innerHTML = `
          <div class="note-actions">
            <button onclick="editNote(${i})">✏️</button>
            <button onclick="deleteNote(${i})">🗑️</button>
          </div>
          <p>${note}</p>
        `;
        box.appendChild(div);
      });
    }

    function addNote() {
      const text = document.getElementById("noteInput").value.trim();
      if (!text) return alert("Please write something!");
      if (editIndex !== null) {
        notes[editIndex] = text;
        editIndex = null;
      } else {
        notes.push(text);
      }
      localStorage.setItem("notes", JSON.stringify(notes));
      document.getElementById("noteInput").value = "";
      renderNotes();
    }

    function editNote(i) {
      document.getElementById("noteInput").value = notes[i];
      editIndex = i;
    }

    function deleteNote(i) {
      if (confirm("Delete this note?")) {
        notes.splice(i, 1);
        localStorage.setItem("notes", JSON.stringify(notes));
        renderNotes();
      }
    }

    function searchNotes() {
      const query = document.getElementById("searchInput").value.toLowerCase();
      const filtered = notes.filter(n => n.toLowerCase().includes(query));
      const box = document.getElementById("notesBox");
      box.innerHTML = "";
      if (filtered.length === 0) {
        box.innerHTML = "<i>No matching notes found.</i>";
        return;
      }
      filtered.forEach((note, i) => {
        const div = document.createElement("div");
        div.className = "note";
        div.innerHTML = `<p>${note}</p>`;
        box.appendChild(div);
      });
    }

    renderNotes();
  </script>
</body>
</html>
