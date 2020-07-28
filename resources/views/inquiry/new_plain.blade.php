
Dear {{ $inquiry->full_name }},

Thank you for your inquiry. Below is a copy for your records.

@foreach ($inquiry->message_lines as $line)
    > {{ $line }}
@endforeach

Also, please enjoy this ASCII art.

_____             _             _____                 _          
|  __ \           | |           |_   _|               (_)         
| |  | | ___  __ _| | ___ _ __    | |  _ __  ___ _ __  _ _ __ ___ 
| |  | |/ _ \/ _` | |/ _ \ '__|   | | | '_ \/ __| '_ \| | '__/ _ \
| |__| |  __/ (_| | |  __/ |     _| |_| | | \__ \ |_) | | | |  __/
|_____/ \___|\__,_|_|\___|_|    |_____|_| |_|___/ .__/|_|_|  \___|
                                            | |               
                                            |_|
                                                    