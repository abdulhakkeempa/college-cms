<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events Report</title>
  
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .event-container {
    display: flex;
    align-items: flex-start;
    clear: both;
    page-break-inside: avoid;
    margin-bottom: 30px;
    page-break-after: always;
  }

  .event-cover-wrapper {
    flex: 0 0 40%;
    margin-bottom: 10px; /* Add a margin-bottom to create a gap */
  }

  .event-cover {
    width: 100%;
    height: 400px;
  }

  .event-details {
    flex: 0 0 60%;
    padding-left: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .event-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .event-date {
    font-size: 14px;
    margin-bottom: 10px;
  }

  .event-description {
    font-size: 14px;
    line-height: 1.5;
  }
</style>
</head>
<body>
  @foreach($events as $event)
    <div class="event-container">
      <div class="event-cover-wrapper">
        <img class="event-cover" src="{{ public_path('storage/' . $event->cover_img) }}" alt="Event Cover Image">
      </div>
      <div class="event-details">
        <h2 class="event-title">{{ $event->event_title }}</h2>
        <p class="event-date">Date: {{ $event->event_date }}</p>
        <p class="event-description">{{ $event->event_desc }}</p>
      </div>
    </div>
  @endforeach
</body>
</html>
