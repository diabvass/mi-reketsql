
const editor = CodeMirror.fromTextArea(document.querySelector('#sqlEditor'), {
    mode: 'text/x-sql',
    theme: 'dracula',
    lineNumbers: true,
    matchBrackets: true,
    indentWithTabs: true,
    lineWrapping: true
});

function setQuery(sql) {
    editor.setValue(sql);
    editor.focus();
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function clearEditor() {
    editor.setValue('');
    editor.focus();
}