DATA_DIR = "../data"


naReplace = function(x, replacement){
	sapply(
		x, 
		function(v){
			if(is.na(v)){
				replacement
			}else{
				v
			}
		}
	)
}
