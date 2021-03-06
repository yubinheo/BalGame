<!doctype html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow">
  <title>BALGAME - 위키 작성</title>
  <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
  <link rel="stylesheet" href="./style.css">
</head>

<body> <br />
    <form action="./wrtok_wiki.php" method="POST">
        <select name="kag" class="text-field" >
            <option value="NULL">카테고리 선택</option>
            <option value="Web Hacking">Web Hacking</option>
            <option value="System Hacking">System Hacking</option>
            <option value="Cryptography">Cryptography</option>
        </select>
        <input type="text" name="title" class="text-field" placeholder="제목" required><br>
        <textarea cols="100" id="editor1" name="contents" rows="10"> </textarea>
        <input type="submit" value="작성" class="submit-btn">
    </from>

    <script>
        function ShowMessage(msg) {
        document.getElementById('eMessage').innerHTML = msg;
        }

        function InsertHTML() {
        var editor = CKEDITOR.instances.editor1;
        var value = document.getElementById('htmlArea').value;

        if (editor.mode == 'wysiwyg') {
            editor.insertHtml(value);
        } else
            alert('You must be in WYSIWYG mode!');
        }

        function InsertText() {
        var editor = CKEDITOR.instances.editor1;
        var value = document.getElementById('txtArea').value;

        if (editor.mode == 'wysiwyg') {
            editor.insertText(value);
        } else
            alert('You must be in WYSIWYG mode!');
        }

        function SetContents() {
        var editor = CKEDITOR.instances.editor1;
        var value = document.getElementById('htmlArea').value;
        editor.setData(value);
        }

        function GetContents() {
        var editor = CKEDITOR.instances.editor1;
        alert(editor.getData());
        }

        function ExecuteCommand(commandName) {
        var editor = CKEDITOR.instances.editor1;

        if (editor.mode == 'wysiwyg') {
            editor.execCommand(commandName);
        } else
            alert('You must be in WYSIWYG mode!');
        }

        function CheckDirty() {
        var editor = CKEDITOR.instances.editor1;
        alert(editor.checkDirty());
        }

        function ResetDirty() {
        var editor = CKEDITOR.instances.editor1;
        editor.resetDirty();
        alert('The "IsDirty" status was reset.');
        }

        function Focus() {
        var editor = CKEDITOR.instances.editor1;
        editor.focus();
        }

        var editor = CKEDITOR.replace('editor1', {
            height: 500
        });
    </script>

</body>

</html>