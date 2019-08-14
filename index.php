<?php

$locations = [
'moscow' => [
'title' => 'Москва',
'latitude' => 55.7558,
'longitude' => 37.6173,
],
'st_petersburg' => [
'title' => 'Санкт-Петербург',
'latitude' => 59.9343,
'longitude' => 30.3351,
],
'irkutsk' => [
'title' => 'Иркутск',
'latitude' => 52.2870,
'longitude' => 104.3050,
],
'vladivostok' => [
'title' => 'Владивосток',
'latitude' => 43.1198,
'longitude' => 131.8869,
],
'murmansk' => [
'title' => 'Мурманск',
'latitude' => 68.9585,
'longitude' => 33.0827,
],
];

$selectedLocation = null;

if (isset($_GET['location'])) {
$selectedLocation = $_GET['location'];

if (!isset($locations[$selectedLocation])) {
echo 'Location not found :-(';
}

$info = date_sun_info(time(), $locations[$selectedLocation]['latitude'], $locations[$selectedLocation]['longitude']);

$sum = (int) ((($info['civil_twilight_begin'] - $info['nautical_twilight_begin']) + ($info['nautical_twilight_end'] - $info['civil_twilight_end'])) / 60);
$sum = $sum > 0 ? $sum : 0;
echo "Cуммарная продолжительность навигационных сумерек в минутах на текущий день: {$sum}";
}

?>

<html>
<head>
<title></title>
</head>
<body>
<form>
<select name="location">
<?php foreach($locations as $id => $location): ?>
<option value="<?= $id ?>" <?= $selectedLocation == $id ? 'selected' : '' ?>><?= $location['title'] ?></option>
<?php endforeach; ?>
</select>
<input type="submit" value="OK">
</form>
</body>
</html>
