## Core Api

### Cities

```php
// get all cities
Sportmonks::core()->cities()->all();
```

```php
// get city by id
Sportmonks::core()->cities()->find($cityId);
```

```php
// search cities by name
Sportmonks::core()->cities()->search($name);
```

### Continents

```php
// get all continents
Sportmonks::core()->continents()->all();
```

```php
// get continent by id
Sportmonks::core()->continents()->find($continentId);
``` 

### Countries

```php
// get all countries
Sportmonks::core()->countries()->all();
```

```php
// get country by id
Sportmonks::core()->countries()->find($countryId);
```

```php
// search countries by name
Sportmonks::core()->countries()->search($name);
```

### Regions

```php
// get all regions
Sportmonks::core()->regions()->all();
```

```php
// get region by id
Sportmonks::core()->regions()->find($regionId);
```

```php
// search regions by name
Sportmonks::core()->regions()->search($name);
```

### Timezones

```php
// get all timezones
Sportmonks::core()->timezones()->all();
```

### Types

```php
// get all types
Sportmonks::core()->types()->all();
```

```php
// get type by id
Sportmonks::core()->types()->find($typeId);
```

```php
// get types by entity
Sportmonks::core()->types()->byEntity();
```

## Football Api

### Coaches

```php
// get all coaches
Sportmonks::football()->coaches()->all();
```

```php
// get coach by id
Sportmonks::football()->coaches()->find($coachId);
```

```php
// get coaches by country id
Sportmonks::football()->coaches()->byCountry($countryId);
```

```php
// search coaches by name
Sportmonks::football()->coaches()->search($name);
```

```php
// get last updated coaches
Sportmonks::football()->coaches()->latest();
```

### Commentaries

```php
// get all commentaries
Sportmonks::football()->commentaries()->all();
```

```php
// get commentaries by fixture id
Sportmonks::football()->commentaries()->byFixture($fixtureId);
```

### Expected (xG)

```php
// get expected by team
Sportmonks::football()->expected()->byTeam();
```

```php
// get expected by player
Sportmonks::football()->expected()->byPlayer();
```

### Fixtures

```php
// get all fixtures
Sportmonks::football()->fixtures()->all();
```

```php
// get fixture by id
Sportmonks::football()->fixtures()->find($fixtureId);
```

```php
// get fixtures by multiple ids
Sportmonks::football()->fixtures()->multiple($fixtureIds);
```

```php
// get fixtures by date
Sportmonks::football()->fixtures()->byDate($date);
```

```php
// get fixtures by date range
Sportmonks::football()->fixtures()->byDateRange($start, $end);
```

```php
// get fixtures by date range for team
Sportmonks::football()->fixtures()->byDateRangeForTeam($start, $end, $teamId);
```

```php
// get fixtures by head to head
Sportmonks::football()->fixtures()->h2h($firstTeamId, $secondTeamId);
```

```php
// search fixtures by name
Sportmonks::football()->fixtures()->search($name);
```

```php
// get upcoming fixtures by market id
Sportmonks::football()->fixtures()->upcomingByMarket($marketId);
```

```php
// get upcoming fixtures by tv station id
Sportmonks::football()->fixtures()->upcomingByTvStation($tvStationId);
```

```php
// get past fixtures by tv station id
Sportmonks::football()->fixtures()->pastByTvStation($tvStationId);
```

```php
// get latest updated fixtures
Sportmonks::football()->fixtures()->latest();
```

### Leagues

```php
// get all leagues
Sportmonks::football()->leagues()->all();
```

```php
// get league by id
Sportmonks::football()->leagues()->find($leagueId);
```

```php
// get leagues by live
Sportmonks::football()->leagues()->live();
```

```php
// get leagues by fixture date
Sportmonks::football()->leagues()->byFixtureDate($date);
```

```php
// get leagues by country id
Sportmonks::football()->leagues()->byCountry($countryId);
```

```php
// search leagues by name
Sportmonks::football()->leagues()->search($name);
```

```php
// get all leagues by team id
Sportmonks::football()->leagues()->allByTeam($teamId);
```

```php
// get current leagues by team id
Sportmonks::football()->leagues()->currentByTeam($teamId);
```

### Livescores

```php
// get all livescores
Sportmonks::football()->livescores()->all();
```

```php
// get inplay livescores
Sportmonks::football()->livescores()->inplay();
```

```php
// get latest updated livescores
Sportmonks::football()->livescores()->latest();
```

### News (pre-match)

```php
// get pre-match news
Sportmonks::football()->news()->preMatch()->all();
```

```php
// get pre-match news by season id
Sportmonks::football()->news()->preMatch()->bySeason($seasonId);
```

```php
// get pre-match news for upcoming fixtures
Sportmonks::football()->news()->preMatch()->forUpcomingFixtures();
```

### News (post-match)

```php
// get post-match news
Sportmonks::football()->news()->postMatch()->all();
```

```php
// get post-match news by season id
Sportmonks::football()->news()->postMatch()->bySeason($seasonId);
```

### Odds pre-match (standard)

```php
// get all pre-match odds
Sportmonks::football()->odds()->preMatch()->all();
```

```php
// get pre-match odds by fixture id
Sportmonks::football()->odds()->preMatch()->byFixture($fixtureId);
```

```php
// get pre-match odds by fixture id and bookmaker id
Sportmonks::football()->odds()->preMatch()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

```php
// get pre-match odds by fixture id and market id
Sportmonks::football()->odds()->preMatch()->byFixtureAndMarket($fixtureId, $marketId);
```

```php
// get last updated pre-match odds
Sportmonks::football()->odds()->preMatch()->latest();
```

### Odds pre-match (premium)

```php
// get all premium pre-match odds
Sportmonks::football()->odds()->preMatch()->premium()->all();
```

```php
// get premium pre-match odds by fixture id
Sportmonks::football()->odds()->preMatch()->premium()->byFixture($fixtureId);
```

```php
// get premium pre-match odds by fixture id and bookmaker id
Sportmonks::football()->odds()->preMatch()->premium()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

```php
// get premium pre-match odds by fixture id and market id
Sportmonks::football()->odds()->preMatch()->premium()->byFixtureAndMarket($fixtureId, $marketId);
```

```php
// get updated premium pre-match odds between time range
Sportmonks::football()->odds()->preMatch()->premium()->updatedBetweenTime($start, $end);
```

```php
// get all historical premium pre-match odds
Sportmonks::football()->odds()->preMatch()->premium()->historical();
```

```php
// get updated historical premium pre-match odds between time range
Sportmonks::football()->odds()->preMatch()->premium()->historicalUpdatedBetweenTime($start, $end);
```

### Odds inplay

```php
// get all inplay odds
Sportmonks::football()->odds()->inplay()->all();
```

```php
// get inplay odds by fixture id
Sportmonks::football()->odds()->inplay()->byFixture($fixtureId);
```

```php
// get inplay odds by fixture id and bookmaker id
Sportmonks::football()->odds()->inplay()->byFixtureAndBookmaker($fixtureId, $bookmakerId);
```

```php
// get inplay odds by fixture id and market id
Sportmonks::football()->odds()->inplay()->byFixtureAndMarket($fixtureId, $marketId);
```

```php
// get last updated inplay odds
Sportmonks::football()->odds()->inplay()->latest();
```

### Players

```php
// get all players
Sportmonks::football()->players()->all();
```

```php
// get player by id
Sportmonks::football()->players()->find($playerId);
```

```php
// get players by country id
Sportmonks::football()->players()->byCountry($countryId);
```

```php
// search players by name
Sportmonks::football()->players()->search($name);
```

```php
// get last updated players
Sportmonks::football()->players()->latest();
```

### Predictions

```php
// get probabilities
Sportmonks::football()->predictions()->probabilities();
```

```php
// get predictability by league id
Sportmonks::football()->predictions()->byLeague($leagueId);
```

```php
// get probabilities by fixture id
Sportmonks::football()->predictions()->byFixture($fixtureId);
```

```php
// get value bets
Sportmonks::football()->predictions()->valueBets();
```

```php
// get value bets by fixture id
Sportmonks::football()->predictions()->valueBetsByFixture($fixtureId);
```

### Referees

```php
// get all referees
Sportmonks::football()->referees()->all();
```

```php
// get referee by id
Sportmonks::football()->referees()->find($refereeId);
```

```php
// get referees by country id
Sportmonks::football()->referees()->byCountry($countryId);
```

```php
// get referees by season id
Sportmonks::football()->referees()->bySeason($seasonId);
```

```php
// search referees by name
Sportmonks::football()->referees()->search($name);
```

### Rivals

```php
// get all rivals
Sportmonks::football()->rivals()->all();
```

```php
// get rivals by team id
Sportmonks::football()->rivals()->byTeam($teamId);
```

### Rounds

```php
// get all rounds
Sportmonks::football()->rounds()->all();
```

```php
// get round by id
Sportmonks::football()->rounds()->find($roundId);
```

```php
// get rounds by season id
Sportmonks::football()->rounds()->bySeason($seasonId);
```

```php
// search rounds by name
Sportmonks::football()->rounds()->search($name);
```

### Schedules

```php
// get schedules by season id
Sportmonks::football()->schedules()->bySeason($seasonId);
```

```php
// get schedules by team id
Sportmonks::football()->schedules()->byTeam($teamId);
```

```php
// get schedules by season id and team id
Sportmonks::football()->schedules()->bySeasonAndTeam($seasonId, $teamId);
```

### Seasons

```php
// get all seasons
Sportmonks::football()->seasons()->all();
```

```php
// get season by id
Sportmonks::football()->seasons()->find($seasonId);
```

```php
// get seasons by team id
Sportmonks::football()->seasons()->byTeam($teamId);
```

```php
// search seasons by name
Sportmonks::football()->seasons()->search($name);
```

### Squads

```php
// get current team squad by team id
Sportmonks::football()->squads()->currentByTeam($teamId); 
```

```php
// get extended team squad by team id
Sportmonks::football()->squads()->extendedByTeam($teamId); 
```

```php
// get team squad by team and season id
Sportmonks::football()->squads()->bySeasonAndTeam($seasonId, $teamId); 
```

### Stages

```php
// get all stages
Sportmonks::football()->stages()->all();
```

```php
// get stage by id
Sportmonks::football()->stages()->find($stageId);
```

```php
// get stages by season id
Sportmonks::football()->stages()->bySeason($seasonId);
```

```php
// search stages by name
Sportmonks::football()->stages()->search($name);
```

### Standings

```php
// get all standings
Sportmonks::football()->standings()->all();
```

```php
// get standings by season id
Sportmonks::football()->standings()->bySeason($seasonId);
```

```php
// get standing correction by season id
Sportmonks::football()->standings()->correctionBySeason($seasonId);
```

```php
// get standings by round id
Sportmonks::football()->standings()->byRound($roundId);
```

```php
// get live standings by league id
Sportmonks::football()->standings()->liveByLeague($leagueId);
```

### States

```php
// get all states
Sportmonks::football()->states()->all();
```

```php
// get state by id
Sportmonks::football()->states()->find($stateId);
```

### Statistics

```php
// get statistics by stage id
Sportmonks::football()->statistics()->byStage($stageId);
```

```php
// get statistics by round id
Sportmonks::football()->statistics()->byRound($roundId);
```

```php
// get statistics by player id
Sportmonks::football()->statistics()->byPlayer($playerId);
```

```php
// get statistics by team id
Sportmonks::football()->statistics()->byTeam($teamId);
```

```php
// get statistics by coach id
Sportmonks::football()->statistics()->byCoach($coachId);
```

```php
// get statistics by referee id
Sportmonks::football()->statistics()->byReferee($refereeId);
```

### Teams

```php
// get all teams
Sportmonks::football()->teams()->all();
```

```php
// get team by id
Sportmonks::football()->teams()->find($teamId);
```

```php
// get teams by country id
Sportmonks::football()->teams()->byCountry($countryId);
```

```php
// get teams by season id
Sportmonks::football()->teams()->bySeason($seasonId);
```

```php
// search teams by name
Sportmonks::football()->teams()->search($name);
```

### TopScorers

```php
// get top-scorers by season id
Sportmonks::football()->topScorers()->bySeason($seasonId);
```

```php
// get top-scorers by stage id
Sportmonks::football()->topScorers()->byStage($stageId);
```

### Transfers

```php
// get all transfers
Sportmonks::football()->transfers()->all();
```

```php
// get transfer by id
Sportmonks::football()->transfers()->find($transferId);
```

```php
// get latest transfers
Sportmonks::football()->transfers()->latest();
```

```php
// get transfers between date range
Sportmonks::football()->transfers()->byDateRange($start, $end);
```

```php
// get transfers by team id
Sportmonks::football()->transfers()->byTeam($teamId);
```

```php
// get transfers by player id
Sportmonks::football()->transfers()->byPlayer($playerId);
```

### TvStations

```php
// get all tv-stations
Sportmonks::football()->tvStations()->all();
```

```php
// get tv-station by id
Sportmonks::football()->tvStations()->find($venueId);
```

```php
// get tv-stations by fixture id
Sportmonks::football()->tvStations()->byFixture($fixtureId);
```

### Venues

```php
// get all venues
Sportmonks::football()->venues()->all();
```

```php
// get venue by id
Sportmonks::football()->venues()->find($venueId);
```

```php
// get venues by season id
Sportmonks::football()->venues()->bySeason($seasonId);
```

```php
// search venues by name
Sportmonks::football()->venues()->search($name);
```

## Odds Api

### Bookmakers

```php
// get all bookmakers
Sportmonks::odds()->bookmakers()->all();
```

```php
// get all premium bookmakers
Sportmonks::odds()->bookmakers()->premium();
```

```php
// get bookmaker by id
Sportmonks::odds()->bookmakers()->find($bookmakerId);
```

```php
// search bookmakers by name
Sportmonks::odds()->bookmakers()->search($name);
```

```php
// get bookmakers by fixture id
Sportmonks::odds()->bookmakers()->byFixture($bookmakerId);
```

```php
// get bookmaker event id's by fixture id
Sportmonks::odds()->bookmakers()->eventsByFixture($fixtureId);
```

### Markets

```php
// get all markets
Sportmonks::odds()->markets()->all();
```

```php
// get all premium markets
Sportmonks::odds()->markets()->premium();
```

```php
// get market by id
Sportmonks::odds()->markets()->find($marketId);
```

```php
// search markets by name
Sportmonks::odds()->markets()->search($name);
```

## My Api

```php
// get all filters by entity
Sportmonks::my()->filters();
```

```php
// get my enrichments
Sportmonks::my()->enrichments();
```

```php
// get my resources
Sportmonks::my()->resources();
```

```php
// get my leagues
Sportmonks::my()->leagues();
```

```php
// get my usage
Sportmonks::my()->usage();
```

## Cricket Api

### Continents

```php
// get all continents
Sportmonks::cricket()->continents()->all();
```

```php
// get continent by id
Sportmonks::cricket()->continents()->find($continentId);
```

### Countries

```php
// get all countries
Sportmonks::cricket()->countries()->all();
```

```php
// get country by id
Sportmonks::cricket()->countries()->find($countryId);
```

### Fixtures

```php
// get all fixtures
Sportmonks::cricket()->fixtures()->all();
```

```php
// get fixture by id
Sportmonks::cricket()->fixtures()->find($fixtureId);
```

### Leagues

```php
// get all leagues
Sportmonks::cricket()->leagues()->all();
```

```php
// get league by id
Sportmonks::cricket()->leagues()->find($leagueId);
```

### Livescores

```php
// get all livescores
Sportmonks::cricket()->livescores()->all();
```

### Officials

```php
// get all officials
Sportmonks::cricket()->officials()->all();
```

```php
// get official by id
Sportmonks::cricket()->officials()->find($officialId);
```

### Players

```php
// get all players
Sportmonks::cricket()->players()->all();
```

```php
// get player by id
Sportmonks::cricket()->players()->find($leagueId);
```

### Positions

```php
// get all positions
Sportmonks::cricket()->positions()->all();
```

```php
// get position by id
Sportmonks::cricket()->positions()->find($positionId);
```

### Scores

```php
// get all scores
Sportmonks::cricket()->scores()->all();
```

```php
// get score by id
Sportmonks::cricket()->scores()->find($scoreId);
```

### Seasons

```php
// get all seasons
Sportmonks::cricket()->seasons()->all();
```

```php
// get season by id
Sportmonks::cricket()->seasons()->find($seasonId);
```

### Squads

```php
// get squad by team and season id
Sportmonks::cricket()->squads()->byTeamAndSeason($teamId, $seasonId);
```

### Stages

```php
// get all stages
Sportmonks::cricket()->stages()->all();
```

```php
// get stage by id
Sportmonks::cricket()->stages()->find($stageId);
```

### Standings

```php
// get standings by season id
Sportmonks::cricket()->standings()->bySeason($seasonId);
```

```php
// get standings by stage id
Sportmonks::cricket()->standings()->byStage($stageId);
```

### TeamRankings

```php
// get global team seasons
Sportmonks::cricket()->teamRankings()->global();
```

### Teams

```php
// get all teams
Sportmonks::cricket()->teams()->all();
```

```php
// get team by id
Sportmonks::cricket()->teams()->find($teamId);
```

### Venues

```php
// get all venues
Sportmonks::cricket()->venues()->all();
```

```php
// get venue by id
Sportmonks::cricket()->venues()->find($venueId);
```

## FormulaOne Api
