

def determine_editor_is_new_wikipedian(edits, definition):
    
    if definition == 'traditional':
        if len(edits) < 10:
            return False
        else:
            return True
    else:
        raise NotImplementedError
    
        