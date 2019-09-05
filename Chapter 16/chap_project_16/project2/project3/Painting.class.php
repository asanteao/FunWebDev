<?php
include_once('Query.inc.php');

class Painting {
	public $paintingID;
	public $title;
	public $artist;
	public $year;
	public $medium;
	public $height;
	public $width;
	public $fileName;
	public $museumLink;
	public $accessionNumber;
	public $copyright;
	public $excerpt;
	public $description;
	public $googleDesc;
	public $wikiLink;
	public $googleLink;
	public $msrp;
	public $gallery;
	public $genres = [];	//array
	public $subjects = [];	//array

	public function __construct($paintingID) {
		//Make DB queries to fill out the above properties
		$this->paintingID = $paintingID;
		try {	
			$sql = 'SELECT * FROM Paintings WHERE PaintingID = '. $paintingID;
			$result = DBQuery($sql);
			if($result) {
				$paintingRow = $result->fetch();
				$this->title = $paintingRow['Title'];
				$sql = 'SELECT ArtistID, FirstName, LastName FROM Artists
					 WHERE ArtistID = '. $paintingRow['ArtistID'];
				$result2 = DBQuery($sql);
				if(!$result2) die("Artist doesn't exist");
				$artistRow = $result2->fetch();
				$this->artist = $artistRow['FirstName'].' '.$artistRow['LastName'];
				$this->year = $paintingRow['YearOfWork'];
				$this->medium = $paintingRow['Medium'];
				$this->height = $paintingRow['Height'];
				$this->width = $paintingRow['Width'];
				$this->fileName = $paintingRow['ImageFileName']. '.jpg';
				$this->museumLink = $paintingRow['MuseumLink'];
				$this->excerpt = $paintingRow['Excerpt'];
				$this->description = $paintingRow['Description'];
				$this->googleDesc = $paintingRow['GoogleDescription'];
				$this->accessionNumber = $paintingRow['AccessionNumber'];
				$this->copyright = $paintingRow['CopyrightText'];
				$this->wikiLink = $paintingRow['WikiLink'];
				$this->googleLink = $paintingRow['GoogleLink'];
				$this->msrp = $paintingRow['MSRP'];
				$sql = 'SELECT GalleryName FROM Galleries
					 WHERE GalleryID = '. $paintingRow['GalleryID'];
				$result3 = DBQuery($sql);
				if(!$result3) die("Gallery doesn't exist");
				$galleryRow = $result3->fetch();
				$this->gallery = $galleryRow['GalleryName'];
				$sql = 'SELECT * FROM (SELECT * FROM PaintingGenres WHERE PaintingID = '. $paintingID
					. ') t1 INNER JOIN Genres ON t1.GenreID = Genres.GenreID';
				$result4 = DBQuery($sql);
				if(!$result4) die('DBQuery error');
				while($genreRow = $result4->fetch()) {
					array_push($this->genres, $genreRow['GenreName']);
				}
	
				// Here we instantiate a variable (@row) to number the rows in the Subject table
				// so we can use it as a key in the join.
				$sql = 'SET @row = 0;
					SELECT * FROM (SELECT * FROM PaintingSubjects WHERE PaintingID = '. $paintingID
						. ') t1 INNER JOIN (SELECT (@row := @row + 1) as Num, SubjectName FROM
					       	Subjects) t2 ON t1.SubjectID = t2.Num;';
				$result5 = DBQuery($sql);
				if(!$result5) die('DBQuery error');
				$result5->nextRowset(); //2 resultSets are returned because we have two statements
							//Skip to second to the second one which is what we are 
							//interested in.
				while($subjectRow = $result5->fetch()) {
					array_push($this->subjects, $subjectRow['SubjectName']);
				}
			}
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getReviews() {
		//Make DB query to Reviews table using paintingID and then return the resultSet
		$sql = 'SELECT * FROM Reviews WHERE PaintingID = '. $this->paintingID;
		$result = DBQuery($sql);
		if(!$result) die ('Query error in getReviews');
		return $result;
	}
}
?>
