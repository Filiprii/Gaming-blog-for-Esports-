<page-home>
	<teams>
		<?php foreach($data_teams AS $i => $d): ?>
		<list>
			<h2>
				<a href="<?= FILE_INDEX ?>?module=teams&action=view&id=<?= $d['teams_id'] ?>"><?= $d['teams_title'] ?></a>
				<?php if (is_admin()): ?>
				<?php endif; ?>
			</h2>
			<div class="date"><?= $d['teams_date'] ?></div>
			<div class="short"><?= $d['teams_short'] ?></div>
		</list>
	<?php endforeach; ?>
	</teams>
	
	<tours>
		<?php foreach($data_tours AS $i => $d): ?>
		<list>
			<h2>
				<a href="<?= FILE_INDEX ?>?module=tours&action=view&id=<?= $d['tours_id'] ?>"><?= $d['tours_title'] ?></a>
			</h2>
			<img src="<?= DIR_PUBLIC_TOURS ?><?= $d['tours_id'] ?>th.jpg">
			<date><?= $d['tours_date'] ?></date>
		</list>
		<?php endforeach; ?>
	</tours>
	<div>
				Dobrodosli na zvanicni sajt <b>informacija o ESPORTU</b>!
			</div>
			<br>
			<div>
				<div> Esports, skraćenica od elektronskih sportova, je oblik takmičenja pomoću video igara. Esportovi često imaju oblik organizovanih takmičenja u video igricama za više igrača, posebno između profesionalnih igrača, pojedinačno ili kao timovi. Iako su organizovana takmičenja dugo bila deo kulture video igara, ona su se uglavnom odvijala između amatera sve do kasnih 2000-ih, kada je učešće profesionalnih gejmera i gledalaca u ovim događajima putem striminga uživo doživelo veliki porast popularnosti. Do 2010-ih, esport je bio značajan faktor u industriji video igara, pri čemu su mnogi programeri igara aktivno dizajnirali i obezbeđivali sredstva za turnire i druge događaje.
				<div> Do kasnih 2010-ih, procenjeno je da će ukupna publika esporta porasti na 454 miliona gledalaca , sa povećanjem prihoda na više od milijardu američkih dolara, pri čemu Kina čini 35% globalnog prihoda od esporta 2020. godine. Sve veća dostupnost onlajn striming medijskih platformi, posebno IouTube i Tvitch, postale su centralne za rast i promociju esport takmičenja. Uprkos tome što je gledanost oko 85% muškaraca i 15% žena, sa većinom gledalaca starosti između 18 i 34 godine, ženske igračice su takođe igrale profesionalno. Popularnost i priznanje esporta prvi put su se desili u Aziji, gde je zabeležen značajan rast u Kini i Južnoj Koreji, pri čemu ova potonja ima licencirane profesionalne igrače od 2000. Uprkos velikoj industriji video igara, esport u Japanu je relativno nerazvijen, što se uglavnom pripisuje svojim širokim zakonima protiv kockanja koji zabranjuju plaćene profesionalne igračke turnire. Izvan Azije, esport je takođe popularan u Evropi i Americi, sa regionalnim i međunarodnim događajima koji se održavaju u tim regionima.
			</div>
</page-home>

