@extends("projects.project")

@section("summary")
<div class="container-fluid">
    <div class="row top-content">
      <!-- image_main -->
      <div class="imgbox img-main col-sm-12 col-lg-8">
        <div class="imgbox-inner">
          <div class="image" style="background-image: url('{{asset('image/pulongTemple.png')}}');"></div>
        </div>
      </div>
      <!-- intro -->
      <div class="intro col-sm-12 col-lg-4">
        <!-- title -->
        <div class="title">
          <h3>
            埔隆宮<span style="font-family: serif;"> - </span>炭烤土司大王
            <br>
          </h3>
          <h6>by Pulong Temple</h6>
          <hr class="hr-prime">
        </div>
        <!-- status -->
        <div class="row status">
          <!-- goal -->
          <div class="goal col-6 col-sm-8 col-lg-6">
			  <h4>NT${{ $project->total_amount }}</h4>
			<p style="font-size: 12px;">目標 NT{{ $project->goal }}</p>
            <hr class="hr-prime">
			<h4>{{ $project->supporters }}<small> 人贊助</small></h4>
            <hr class="hr-prime">
			<h4>{{ $project->days_left }}<small> 天剩餘</small></h4>
          </div>
          <!-- Progress bar -->
          <div class="col-6 col-sm-4 col-lg-6">
            <div class="circle-pg-box ab-center">
              <div class="circle-pg">
                <div class="circle-pg-inner">
					        <div class="percent">{{ $project->progress }}%</div>
                  <div class="water"></div>
                  <div class="glare"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- description -->
        <div class="description">
          <p class="lead">
            　　埔隆宮為了成功轉型成為斂財集團，
            在埔里酒廠對面新開了一間宵夜炭烤土司，
            作為推廣活動與洗腦大眾的外展據點。
          </p>
        </div>
      </div>
    </div>
</div>
@endsection
@section("content-active")
active
@endsection


@section("sub-content")
<div class="container-fluid bottom-content">
  <div class='row'>
    <div class='col-12 col-lg-8'>
      <a class="db mb4" href="/projects/burnfont/updates/10614">
        <div class='ba pa3 b--light-gray'>
          <div class='black mb3'>
            計畫更新<span class='gray f7 ml3'>發佈於 2020/03/31</span></div>
          <span class='b'>ありがとう！所有目標都已解鎖！激燃體確定製作「日文假名」</span>
        </div>
      </a>
      <div class='js-expand-project-content maxh7 mb3 overflow-hidden relative maxh-none-ns mv-child-0 overflow-visible-ns'>
        <h2 class="hide-child">
          <a name="h-%E3%80%8C%E5%AD%97%E7%B5%A6%E6%88%91%E5%86%8D%E5%A4%A7%E3%80%81%E6%9B%B4%E5%A4%A7%E3%80%81%E8%B7%B3%E5%87%BA%E4%BE%86%E3%80%81%E5%86%8D%E5%87%BA%E4%BE%86%EF%BC%81%EF%BC%81%E3%80%8D" class="nt6 absolute"></a>
          <span class="wysiwyg-color-red"><b>「字給我再大、更大、跳出來、再出來！！」</b></span>
          <a href="#h-%E3%80%8C%E5%AD%97%E7%B5%A6%E6%88%91%E5%86%8D%E5%A4%A7%E3%80%81%E6%9B%B4%E5%A4%A7%E3%80%81%E8%B7%B3%E5%87%BA%E4%BE%86%E3%80%81%E5%86%8D%E5%87%BA%E4%BE%86%EF%BC%81%EF%BC%81%E3%80%8D" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a>
        </h2>
        <div class="wysiwyg-text-align-left">
          你也是這句話的受害苦主嗎？<br>
          其實字夠不夠突出，跟大不大不見得有關係，<br>
          反而跟設計的方式、風格更相關。<br>
        </div>
        <h3 class="hide-child">
          <a name="h-%E7%82%BA%E4%BA%86%E6%8B%AF%E6%95%91%E5%AD%97%E5%A4%AA%E5%B0%8F%E3%80%81%E5%AD%97%E5%A4%AA%E7%B4%B0%E3%80%81%E5%AD%97%E5%87%BA%E4%B8%8D%E4%BE%86%E7%9A%84%E5%8D%B1%E6%A9%9F%EF%BC%8C%E6%88%91%E5%80%91%E9%9C%80%E8%A6%81%E8%B6%85%E7%B4%9A%E6%AD%A6%E5%99%A8%E2%8B%AF%E2%8B%AF%E6%BF%80%E7%87%83%E9%AB%94%EF%BC%81" class="nt6 absolute"></a>
          <b><span class="wysiwyg-color-red">為了拯救字太小、字太細、字出不來的危機，我們需要超級武器⋯⋯激燃體！</span></b>
          <a href="#h-%E7%82%BA%E4%BA%86%E6%8B%AF%E6%95%91%E5%AD%97%E5%A4%AA%E5%B0%8F%E3%80%81%E5%AD%97%E5%A4%AA%E7%B4%B0%E3%80%81%E5%AD%97%E5%87%BA%E4%B8%8D%E4%BE%86%E7%9A%84%E5%8D%B1%E6%A9%9F%EF%BC%8C%E6%88%91%E5%80%91%E9%9C%80%E8%A6%81%E8%B6%85%E7%B4%9A%E6%AD%A6%E5%99%A8%E2%8B%AF%E2%8B%AF%E6%BF%80%E7%87%83%E9%AB%94%EF%BC%81" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a>
        </h3>
        <br>
        <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163880_image_big.jpg?1584554376">
        <br>
        <div class="wysiwyg-text-align-left">
          抓住目光，沒有更簡單的方法。<br>
          傾斜架構、粗壯骨肉，全滿爆發的衝撞力道。<br>
          換激燃體，讓廣告素材、包裝設計一看就生火。
        </div>
        <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163771_image_big.gif?1584521116">
        <h2 class="hide-child">
          <a name="h-%E8%BE%A3%E5%88%B0%E7%94%9F%E7%81%AB%EF%BC%8C%E8%A1%8C%E9%8A%B7%E5%BF%85%E5%82%99%E7%87%83%E6%96%99" class="nt6 absolute"></a>
          <b>
            <span class="wysiwyg-color-red">辣到生火，行銷必備燃料</span>
          </b>
          <a href="#h-%E8%BE%A3%E5%88%B0%E7%94%9F%E7%81%AB%EF%BC%8C%E8%A1%8C%E9%8A%B7%E5%BF%85%E5%82%99%E7%87%83%E6%96%99" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a>
        </h2>
        <div>
          精雕細琢的訴求，沒人理。<br>
          用心繪製的主視覺，沒人注意。<br>
          節慶檔期訊息競爭太激烈，該如何脫穎而出？<br>
          消費者手指很忙，要怎樣讓他們為你停下來？<br>
        </div>
        <h4 class="hide-child">
          <a name="h-%E5%95%8F%E9%A1%8C%E5%9C%A8%E5%AD%97%E9%AB%94%EF%BC%81" class="nt6 absolute"></a><b>問題在字體！<a href="#h-%E5%95%8F%E9%A1%8C%E5%9C%A8%E5%AD%97%E9%AB%94%EF%BC%81" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a></b>
        </h4>
        <div>
          換特殊設計的激燃體，清楚傳遞訊息，印象深刻：<br><br>
          限時特賣，用激燃體做出<span class="wysiwyg-color-red">急迫感</span>。<br>
          新門市開幕，用激燃體<span class="wysiwyg-color-red">大聲宣告</span>。<br>
          破除錯假訊息，用激燃體<span class="wysiwyg-color-red">引起關注</span>。<br>
          街頭線上倡議，用激燃體<span class="wysiwyg-color-red">吼出訴求</span>。<br><br>
          激烈燃燒的小宇宙，將會震撼你的觀眾。<br>在前期創作的時候，有幸與一些品牌、小編合作，大家先來看看他們應用的效果～<br>
        </div>
        <p>
          <br></p>
        <h2><span class="wysiwyg-color-red"><b><img alt="" data-img-src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163928_image_big.jpg?1584590306"><img alt="" data-img-src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163929_image_big.jpg?1584590327"><br></b></span></h2>
        <h2 class="hide-child">
          <a name="h-%E6%BF%80%E7%83%88%E7%87%83%E7%87%92%E7%9A%84%E5%B0%8F%E5%AE%87%E5%AE%99%EF%BC%9A%E6%BF%80%E7%87%83%E9%AB%94" class="nt6 absolute"></a>
          <b><span class="wysiwyg-color-red">激烈燃燒的小宇宙：激燃體</span></b>
          <a href="#h-%E6%BF%80%E7%83%88%E7%87%83%E7%87%92%E7%9A%84%E5%B0%8F%E5%AE%87%E5%AE%99%EF%BC%9A%E6%BF%80%E7%87%83%E9%AB%94" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a>
        </h2>
        <div>
          激燃體，取意「激烈燃燒的小宇宙」。<br><br>企圖用粗壯有力的骨肉、傾斜的衝撞力道，企圖拉高台灣字體的聲量。我期待未來的倡議者、創作者，都能用激燃體得到更多目光，讓訴求得到更多眼球。<br>
        </div>
        <h3 class="hide-child">
          <a name="h-%E8%A8%AD%E8%A8%88%E5%B8%AB%C2%A0%E6%9E%97%E8%8A%B3%E5%B9%B3" class="nt6 absolute"></a><b>設計師 林芳平<a href="#h-%E8%A8%AD%E8%A8%88%E5%B8%AB%C2%A0%E6%9E%97%E8%8A%B3%E5%B9%B3" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a></b>
        </h3>
        <div>2017 年以父親從前經營的五金行為名，成立了個人設計工作室「永興行工作室」。曾經在平面設計領域載浮載沉，直到遇見字體設計，發覺真正的熱情所在，並以「厚道體」獲得2019年日本森澤字體設計競賽人氣獎第一名。<br><br>
          <div class="imgbox">
            <div class="imgbox-inner">
              <div class="image" style="background-image: url('https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_164006_image_big.jpg?1584607647');"></div>
            </div>
          </div>
          我的本業是平面設計師。<br>
        </div>
        <div>剛出社會時，曾在電商擔任美編。<br>
          經歷完整促銷活動檔期，我對行銷的需求不陌生。<br>
          台灣很多主管總在抱怨字不夠跳、不夠出來，字再大一點，我自己也有經歷過。<br><br>
          但我的經驗是不是只有放大就會有用，很多時候跟字本身有關。激燃體的設計目的就是要讓用字的人可以輕易喊出很大的聲音。<br>
        </div>
        <h3 class="hide-child">
          <a name="h-%E4%BD%A0%E7%9A%84%E7%94%A8%E5%AD%97%E5%B0%8F%E4%BA%8B%EF%BC%8C%E6%88%91%E7%9A%84%E8%A8%AD%E8%A8%88%E5%A4%A7%E4%BA%8B" class="nt6 absolute"></a>
          你的用字小事，我的設計大事
          <a href="#h-%E4%BD%A0%E7%9A%84%E7%94%A8%E5%AD%97%E5%B0%8F%E4%BA%8B%EF%BC%8C%E6%88%91%E7%9A%84%E8%A8%AD%E8%A8%88%E5%A4%A7%E4%BA%8B" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a>
        </h3>
        <div>
          為了「最粗最滿」，又要如何兼顧清晰度呢？<br>
          若要讓這麼粗的字也可以保持一定的易認、整齊、美觀，就需要打破一些既有的邏輯。<br><br>
          別的字先設計黑色，但我反過來先畫出白色；<br>
          其他作品初期先決定筆畫該長什麼樣子，但激燃體初期先決定空間如何分配。<br><br>
          <img class="width-img" src="ttps://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163779_image_big.jpg?1584522851">
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163080_image_big.jpg?1584347421">
          <br>
          我在簡筆與造型設計上花了很多心力，<br>大幅降低碎形空間對清晰度與美感的影響，<br>
          讓激燃體在筆畫最粗時仍保有良好的易認性。<br>
          希望這些繁複的調整，在將來可以幫助你喊得大聲、喊得清楚。<br>
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163933_image_big.jpg?1584590636">
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163934_image_big.jpg?1584590669">
          <br><br><br>
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163797_image_big.gif?1584524607">
          <br><br>
        </div>
        <h2 class="hide-child">
          <a name="h-%E9%87%8D%E5%8F%A3%E5%91%B3%E5%9F%BA%E8%AA%BF%EF%BC%8C%E5%8A%A0%E6%96%99%E6%9B%B4%E5%8B%A2%E4%B8%8D%E5%8F%AF%E6%93%8B" class="nt6 absolute"></a>
          <b>
            <span class="wysiwyg-color-red">重口味基調，加料更勢不可擋</span>
          </b>
          <a href="#h-%E9%87%8D%E5%8F%A3%E5%91%B3%E5%9F%BA%E8%AA%BF%EF%BC%8C%E5%8A%A0%E6%96%99%E6%9B%B4%E5%8B%A2%E4%B8%8D%E5%8F%AF%E6%93%8B" class="gray child f6 v-mid absolute left-0-ns nl3-ns">#</a>
        </h2>
        <div>
          激燃體是個重口味的字體。單單只是配在圖上當作主標題，就會發揮它的強力效果。<br>
          簡單地配上角色，就能立刻吸引觀眾目光。<br><br>
          例如我很喜歡曲奇放克的《青春激走》漫畫，<br>
          換上了激燃體，更能點亮青春熱血的故事。
        </div>
        <p>
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163802_image_big.jpg?1584526091">
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163936_image_big.jpg?1584590722">
          <br>
        </p>
        又如森羅創作的 cyberpunk 感系列角色，<br>
        搭配了激燃體，更能強調作品的戲劇張力。
        <p>
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163804_image_big.jpg?1584526160">
          <br>
        </p>
        耳熟能詳的經典怪物，例如卡美拉、哥吉拉，<br>
        也能用激燃體表現他們的威力。
        <p>
          <br>
          <img class="width-img" src="https://s3-ap-northeast-1.amazonaws.com/zeczec-prod/asset_163938_image_big.jpg?1584590820">
          <br><br>
        </p>
        <b>
          再加一點點料，讓激燃體變身成為超帥的標準字！
        </b>
        <div>
          <br>單純的圖片配上字，效果就非常出來。<br>
          我想這就是激燃體最大的特色吧！<br><br>
          而有經驗一點的設計師，也能適當地加點料，讓激燃體加倍突出。例如陰影、邊框、深淺對比，甚至是厲害的動態，都能讓訊息加倍滿出來、衝出來、噴出來！<br>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
