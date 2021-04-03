var Gallery = new Class({
	
	Implements: [Options, Events],
	
	options: {
		container: 'listPartners',		
		direction: 'LTR',
		itemWidth: 130,
		fx: null,		
		totalImages: 0,
		scrollTimeout: 1000,
		clickTimeout: 4500,
		timerScroll: null,
		timerClick: null,
		ulTags: null,
		liTags: null,
		scrollContainer: null,
		btnPrevious: null,
		btnNext: null		
	},
	
	initialize: function(options){		
		this.setOptions(options);
		this.initGallery();	
		if(this.options.totalImages >= 4){
			this.setAutoRun();
		}
	},	
	
	initGallery: function(){
		var that = this;
		that.options.container = $(that.options.container);
		if(!that.options.container) return;
		that.options.scrollContainer = that.options.container.getElement('div.listLogo');
		that.options.btnPrevious	= that.options.container.getElement('p.btnPrev');
		that.options.btnNext	= that.options.container.getElement('p.btnNext');		
		if(!that.options.container || !that.options.scrollContainer || !that.options.btnPrevious || !that.options.btnNext){
			return;
		}
		that.options.ulTags = that.options.scrollContainer.getElement('ul');
		that.options.liTags = that.options.ulTags.getElements('li');
		that.options.totalImages = that.options.liTags.length;
		that.options.btnPrevious.enabled = true;
		that.options.btnPrevious.addEvent('click', function(e){
			if(e){
				e.stop();
			}			
			if(!that.options.btnPrevious.enabled){
				return;
			}
			window.clearInterval(that.options.timerScroll);
			window.clearTimeout(that.options.timerClick);
			that.options.direction = 'RTL';
			that.toLi(--that.options.currentIndex);
			that.options.timerClick = window.setTimeout(function(){
				that.setAutoRun();
			}, that.options.clickTimeout);
		});
		that.options.btnNext.enabled = true;
		that.options.btnNext.addEvent('click', function(e){
			if(e){
				e.stop();
			}
			if(!that.options.btnNext.enabled){
				return;
			}
			window.clearInterval(that.options.timerScroll);
			window.clearTimeout(that.options.timerClick);
			that.options.direction = 'LTR';			
			that.toLi(++that.options.currentIndex);
			that.options.timerClick = window.setTimeout(function(){
				that.setAutoRun();
			}, that.options.clickTimeout);
		});
		
		if(that.options.totalImages < 7){
			that.options.btnNext.enabled = false;
			that.options.btnPrevious.enabled = false;
			that.options.btnPrevious.setStyle('opacity', '0.5');
			that.options.btnNext.setStyle('opacity', '0.5');	
			that.options.ulTags.setStyle('width', that.options.itemWidth * 4);	
			return;
		}	
		that.options.fx = new Fx.Scroll(that.options.scrollContainer, {
			link: 'ignore',					
			onComplete: function(){
				
				if(that.options.currentIndex <= 1){					
					that.options.currentIndex = that.options.totalImages +1;
					that.options.fx.set(that.options.itemWidth * that.options.currentIndex, 0);					
				}
				
				if(that.options.currentIndex > that.options.totalImages +1){				
					that.options.currentIndex = 2;	
					that.options.fx.set(that.options.itemWidth * (that.options.currentIndex), 0);					
				}
				
			}
		});			
		that.swapItem();
		that.options.ulTags = that.options.scrollContainer.getElement('ul');
		that.options.liTags = that.options.ulTags.getElements('li');
		that.options.liTags.each(function(li){
			//li.getElement('p').setOpacity(0.6);
		});
		
		that.options.currentIndex = 4;
		that.options.fx.set(that.options.itemWidth * that.options.currentIndex, 0);					
		that.toLi(that.options.currentIndex);				
	},
	
	swapItem: function(){
		var that = this;
		that.options.liTags[0].clone().inject(that.options.ulTags, 'bottom');
		that.options.liTags[1].clone().inject(that.options.ulTags, 'bottom');
		that.options.liTags[2].clone().inject(that.options.ulTags, 'bottom');
		that.options.liTags[3].clone().inject(that.options.ulTags, 'bottom');
		that.options.liTags[4].clone().inject(that.options.ulTags, 'bottom');
		that.options.liTags[that.options.totalImages - 1].clone().inject(that.options.ulTags, 'top');		
		that.options.liTags[that.options.totalImages - 2].clone().inject(that.options.ulTags, 'top');		
		that.options.liTags[that.options.totalImages - 3].clone().inject(that.options.ulTags, 'top');		
		that.options.liTags[that.options.totalImages - 4].clone().inject(that.options.ulTags, 'top');
	},
	
	toLi: function(index){
		var that = this;				
		that.options.fx.toElement(that.options.liTags[index]);			
	},
		
	setAutoRun: function(){
		var that = this;
		var fn = $empty;		
		if(that.options.direction == 'LTR'){
			fn = that.options.btnNext;	
		}
		else{
			fn = that.options.btnPrevious;
		}
		that.options.timerScroll = window.setInterval(function(){
			fn.fireEvent('click');
		}, that.options.scrollTimeout);
	}
});

function initFadeListImages(){
	var listImg = $('banner');		
	if(!listImg) return;
	var imgs = listImg.getElements('img');
	var imgCur = 0;
	imgs[0].setStyle('opacity', 1);
	imgs[0].fx = new Fx.Tween(imgs[0], {
		duration: 3000
	});
	if(imgs.length > 1){
		for(var i = 1; i < imgs.length; i++){
			imgs[i].setStyle('opacity', 0).removeClass('hidden');
			imgs[i].fx = new Fx.Tween(imgs[i], {
				duration: 3000
			});
		}
		var lsTimer = setInterval(function(){			
			imgs[imgCur].fx.cancel().start('opacity',[1,0]);
			imgCur = (imgCur < imgs.length - 1)?(imgCur + 1):0;
			imgs[imgCur].fx.cancel().start('opacity',[0,1]);
		}, 4500);	
	}	
}

/////////////////
function initFadeGallery(){
	var listImg = $('latestNews');		
	if(!listImg) return;
	var imgs = listImg.getElements('.latestNewsInfo');
	var imgCur = 0;
	imgs[0].setStyle('opacity', 1);
	imgs[0].fx = new Fx.Tween(imgs[0], {
		duration: 2000,
		link: 'cancel'
	});
	
	if(imgs.length > 1){
		for(var i = 1; i < imgs.length; i++){
			imgs[i].setStyle('opacity', 0).removeClass('hidden');
			imgs[i].fx = new Fx.Tween(imgs[i], {
				duration: 2000,
				link: 'cancel'
			});
		}
		var lsTimer = setInterval(function(){
			imgs[imgCur].setStyle('zIndex', 1);
			imgs[imgCur].fx.cancel().start('opacity', 0);
			imgCur = (imgCur < imgs.length - 1)?(imgCur + 1):0;
			imgs[imgCur].setStyle('zIndex', 7);
			imgs[imgCur].fx.cancel().start('opacity', 1);
		}, 2500);	
	}
	
	var links = listImg.getElements('.btn2 a');
	if(links.length == 2){
		links[0].removeEvents().addEvent('click', function(e){
			if(e){
				e.stop();
			}
			imgs[imgCur].setStyle('zIndex', 1);
			imgs[imgCur].fx.cancel().start('opacity', 0);
			imgCur = (imgCur > 0)? (imgCur - 1): imgs.length - 1;
			imgs[imgCur].setStyle('zIndex', 7);
			imgs[imgCur].fx.cancel().start('opacity', 1);
		});
		
		links[1].removeEvents().addEvent('click', function(e){
			if(e){
				e.stop();
			}
			imgs[imgCur].setStyle('zIndex', 1);
			imgs[imgCur].fx.cancel().start('opacity', 0);
			imgCur = (imgCur < imgs.length - 1)?(imgCur + 1):0;
			imgs[imgCur].setStyle('zIndex', 7);
			imgs[imgCur].fx.cancel().start('opacity', 1);
		});
	}
}
////////////////////
var Navigator = new Class({
		
		Implements: [Options, Events, Chain],
		
		initialize: function(element, options){
			this.element = element;
			this.setOptions(options);
			this.setupNavigator();
		},
		
		setupNavigator: function(){
			var navHolder = $(this.element);
			if (!navHolder) {
				return;
			}
			var uls = navHolder.getElement('ul');
			if(!uls) return;
			var togglers = uls.getElements('a.sublev');
			var startToggle = -1;
			for(var i=0; i<togglers.length; i++){
				if(togglers[i].hasClass('open')){
					startToggle = i;
					break;
				}
			}
			
			var elements = uls.getElements('ul').setStyle('display', 'block');
			
			var accordionObj = new Accordion(togglers, elements, {
				duration: 'short',
				display: startToggle,
				show: startToggle,
				alwaysHide:true,
				onActive: function(toggler, element){
					toggler.getParent().addClass('current');				
				},
				onBackground: function(toggler, element){
					toggler.getParent().removeClass('current');
				}			
			});			
		}	
	});

////////////////////
var MultiLevel = new Class({
	Implements: [Options, Events, Chain],
	initialize: function(element, options){
		var root = $(element);
		if(root){
			var togglers = root.getElements('a.sublev');
			var containers = togglers.getNext();
			var that = this;
			var block = false;
			if(togglers.length){
				containers.each(function(cont, idx){
					cont.store('fx', new Fx.Morph(cont, {
						link: 'cancel',
						onComplete: function(){
							if(this.element.getStyle('height') == '0px'){
								this.element.removeProperty('style').setProperty('style', '').setStyle('display', 'none');
							}else{
								this.element.removeProperty('style').setProperty('style', '').setStyle('display', 'block');
							}
							
							block = false;
						},
						onStart: function(){
							if(this.element.getStyle('display') == 'none'){
								this.element.setStyles({'height': 0, 'opacity': 0});
							}
							
							this.element.setStyles({
								'display': 'block',
								'overflow': 'hidden'
							});
							
							block = true;
						}
					}));
					
					if(togglers[idx].hasClass('open')){
						cont.setStyle('display', 'block');
						togglers[idx].store('toggle', 1);
					}else{
						togglers[idx].store('toggle', 0);
						cont.setStyle('display', 'none');
					}
				});
				
				togglers.each(function(toggler, index){
					var hideMe = function(){
						toggler.store('toggle', 0).getParent('li').removeClass('active');
						containers[index].retrieve('fx').start({'height': 0, 'opacity': 0});
					};
					
					toggler.addEvent('click', function(e){
						if(e){
							e.stop();
						}
						
						if(block){
							return false;
						}
						
						if(this.retrieve('toggle', 0)){
							this.store('toggle', 0).getParent('li').removeClass('active');
							containers[index].retrieve('fx').start({'height': 0, 'opacity': 0});
						}else{
							this.store('toggle', 1).getParent('li').addClass('active');
							containers[index].retrieve('fx').start({'height': [0, that.quickSize(containers[index]).height], 'opacity': [0, 1]});
						}
					});
				});
			}
		}
	},
	quickSize: function(elem, prop) {
		var old = {};
		var open = {'overflow': 'hidden', 'position': 'absolute', 'visibility': 'hidden', 'display': 'block'};
		
		for(var name in open){
			old[name] = elem.style[name];
			elem.style[name] = open[name];
		}

		var result = {
			'width': elem.offsetWidth,
			'height': elem.offsetHeight
		}

		for (name in open) {
			elem.style[name] = old[name];
		}
		
		return result;
	}
});
////////////////////
window.addEvent('domready', function(){	
	initFadeGallery();
	initFadeListImages();
	new Gallery();
	//new Navigator('levMenu');
	new MultiLevel('levMenu');
});