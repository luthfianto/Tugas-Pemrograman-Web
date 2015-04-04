import cgi, strtabs
import strutils as str

writeContentType()

const TARGET_FILE = "data.txt"
const OPSI = ["Ya", "Jelas", "Insya Allah"]

proc get() = 
    echo("""
<!DOCTYPE html>
<html>
<head>
    <title>Poll</title>
</head>
<body>
<form action="poll.exe" method="POST">
Apakah saya tampan?<br/>

<input type="radio" name="poll" value=0>Ya</input><br/>
<input type="radio" name="poll" value=1>Jelas</input><br/>
<input type="radio" name="poll" value=2>Insya Allah</input><br/>

<br/>

<button>Kirim!</button>
</form>

</body>
</html>""")

proc post() =
    let post_data = readData()
    let selected : int = str.parseInt(post_data["poll"])

    let isi_file = readFile(TARGET_FILE)
    var array_isi_file = str.split(isi_file,"\n")

    # echo(array_isi_file[selected])
    array_isi_file[selected]=intToStr( str.parseInt(array_isi_file[selected])+1 )
    # echo(array_isi_file[selected])
    # echo("---------------")

    var to_be_written : string = ""

    for key, value in array_isi_file:
        if key<2:
            to_be_written = to_be_written & value & "\n"
        else:
            to_be_written = to_be_written & value
        echo(OPSI[key] & ": " & value & "<br>\n")

    writeFile(TARGET_FILE, to_be_written)


if getRequestMethod()=="GET":
    get()
else:
    post()